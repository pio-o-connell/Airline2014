<?php

include("library.php");


session_start();



// start point for script 
main();

function main() {

    $cmd = "";

    $hasCookie = false;
    //      echo $_COOKIE['username'];
    if (isset($_COOKIE['username'])) {
        // only create the cart when the session starts
        $hasCookie = true;
    }

    if (!isset($_SESSION['cart'])) {
        // only create the cart when the session starts
        $_SESSION['cart'] = new Cart();
    }


    if (isset($_POST['cmd'])) {
        $cmd = $_POST['cmd'];
    } else if (isset($_GET['cmd'])) {

        $cmd = $_GET['cmd'];
    }

    //       echo "cmd".$cmd;
    switch ($cmd) {
        case "":

            if ($hasCookie) {
                if (($_COOKIE['username']) == "rmiller")
                    new adminView($hasCookie);
                else
                    new SearchView($hasCookie);
            }
            else {
                $_SESSION['username'] = "Guest";

                new SearchView($hasCookie);
            }
            break;
        case "login":
            new loginView($hasCookie);
            break;
        case "register":
            new registerView($hasCookie);
            break;
        case "loginRequest":
            handleLogin();
            break;
        case "search":
            handleSearch($hasCookie);
            break;
        case "addToCart":
            handleAddToCart();
            break;
        case "Update":
            $_SESSION['cart']->processFromCart();
            new purchaseView($hasCookie);
            break;
        case "checkoutView":
            new CheckoutView($hasCookie);
            break;
        case "customerRequest":
            handleAddtransation();
            break;
        case "delCheckoutItem":
            $_SESSION['cart']->deleteFromCart($_GET['cartID']);
            new CheckoutView($hasCookie);
            break;
        case "purchase":
            new purchaseView($hasCookie);
            break;
        case "registerRequest":
            handleAddUser($hasCookie);
            $hasCookie = 1;
            new SearchView($hasCookie);
            break;
        case "editroute":
            $routeid = $_GET['routeid'];
            new adminEditView($routeid);
            break;
        case "amendroute":
            handleUpdateprice($_POST['firstname'], $_POST['index']);
            new adminView($hasCookie);
            break;
        case "deleteRoutes":
            handleDeleteroutes();
            new adminView($hasCookie);
            break;
        case "addRoutes":
            new adminAddRoute($hasCookie);
            break;
        case "addRoute":
            handleAddNewRoute($_POST['source'], $_POST['destination'], $_POST['operationalFrom'], $_POST['operationalTo'], $_POST['Price']);
            new adminAddRoute($hasCookie);
            break;
        case "manifest":
            handleViewManifest($hasCookie);
            break;
        case "openflight":
            $date = $_GET['dateid'];
            $route = $_GET['routeid'];
            handledisplayFlightdetails($date, $route);
            break;
        case "defaultAdmin":
            new adminView($hasCookie);
            break;
        case "viewdate":
            $date = $_GET['dateid'];
            new ResultsView($_SESSION['route'], $_SESSION['seatCount'], $_SESSION['date'], $hasCookie);
            handleSeating($date);
            break;
        case "logout":
            if (isset($_COOKIE['username'])) {
                setcookie('username', false, time() - 60 * 100000, '/'); // empty value and old timestamp
                unset($_COOKIE['username']);
            }
            $_SESSION['username'] = "Guest";
            $hasCookie = false;
            new SearchView($hasCookie);

            break;
    }
}

function validateDate($date, $format = 'd-m-Y H:i:s') {

    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function handleSearch($hasCookie) {
    $_SESSION['route'] = $_POST['route'];
    $_SESSION['seatCount'] = $_POST['seatCount'];
    $_SESSION['date'] = $_POST['date'];



    try {
        $yrdata = strtotime($_POST['date']);
        $input = date('d-m-Y', $yrdata);

        $date_format = 'd-m-Y';

        $time = strtotime($input);

        $is_valid = date($date_format, $time) == $input;

        //  print "Valid? ".($is_valid ? 'yes' : 'no');


        if (!$is_valid) {
            new SearchView($hasCookie);
            echo "<br> Valid Dates e.g.'01-Jan-2014'only";
        } else {
            if (!is_numeric($_POST['seatCount'])) {
                new SearchView($hasCookie);
                echo "<br> Not numeric value entered";
            } else {
                if (!(($_POST['seatCount'] > 0 ) && ($_POST['seatCount'] < 21))) {
                    new SearchView($hasCookie);
                    echo "<br> Value between 1 and 20";
                } else
                    new ResultsView($_POST['route'], $_POST['seatCount'], $_POST['date'], $hasCookie);
            }
        }
    } catch (Exception $e) {
        echo "<br> Valid Dates e.g.'01-Jan-2014'only";
    }
}

function handleAddToCart() {
    $flightInfo = array();
    $flightInfo['route'] = $_SESSION['route'];
    $flightInfo['seatCount'] = $_SESSION['seatCount'];
    $flightInfo['date'] = $_POST['flightDate'];
    $seats = array(
        "N", "N", "N", "N", "N",
        "N", "N", "N", "N", "N",
        "N", "N", "N", "N", "N",
        "N", "N", "N", "N", "N"
    );
    $freeSeats = 0;
    $DBM = new DBManager();
    $DBM->processSeating1($flightInfo['date'], $flightInfo['seatCount'], $seats, $freeSeats);
    $flightInfo['seats'] = $seats;
    $flightInfo['freeSeats'] = $freeSeats;
    $hasCookie = false;
    if (isset($_COOKIE['username']))
        $hasCookie = true;
    if ($freeSeats >= $_SESSION['seatCount']) {


        new SearchView($hasCookie);
        echo "Added to Cart provisional purchases- edit as see fit";
        $_SESSION['cart']->addToCart($flightInfo);
    } else {
        new SearchView($hasCookie);
        echo "Only $freeSeats available -- not added to cart";
    }
}

function handleAdduser(&$hasCookie) {
    $DBM = new DBManager();
    $data = $DBM->addUser($hasCookie);

    return $data;
}

function handleUpdateprice($value, $index) {
    $DBM = new DBManager();
    $DBM->updateRoute($value, $index);
}

function handleDeleteroutes() {
    $DBM = new DBManager();
    $DBM->deleteRoutes();
}

function handleAddNewRoute($source, $destination, $operationalFrom, $operationalTo, $price) {
    $DBM = new DBManager();

    $count = $DBM->checkNmrroutes();

    if ($count > 4) {
        echo "Max. number of routes entered";
    } else {
        try {
            $fromDate = new DateTime($operationalFrom);
            $toDate = new DateTime($operationalTo);
            $DBM->addRoute($source, $destination, $fromDate, $toDate, $price);
        } catch (Exception $e) {
            echo "Date entered in incorrect format e.g. 01-Jan-2014";
            new adminAddRoute(1);
        }
    }
    //    $DBM->addRoute($source,$destination,$operationalFrom,$operationalTo,$price);
    //    $DBM->addRoute();  
}

function handleAddtransation() {
    //echo "processing anonymous user details /n";
    $_SESSION['cart']->updateTransactions($_POST['username'], $_POST['email'], $_POST['CreditCardNo'], $_POST['PassportNo']);
    echo "<br><a href=\"controller.php\">Back to search</a>";
}

function handleViewManifest($hasCookie) {
    echo "<BR> View Manifest";
    new adminManifest($hasCookie);
}

function handleLogin() {



    $DBM = new DBManager();

    $result = $DBM->processLogin($_POST['username'], $_POST['password']);

    if ($result == "rmiller") {
        setCookie('username', $_POST['username'], time() + 3600, '/');
        $hasCookie = 1;           // shimmy
        $_SESSION['username'] = "rmiller";
        new adminView($hasCookie);
    } else if ($result == "user") {
        setCookie('username', $_POST['username'], time() + 3600, '/');
        $_SESSION['username'] = $_POST['username'];
        $hasCookie = 1;            //shimmy
        new SearchView($hasCookie);
    } else {
        echo "<br> invalid login <br>";
        $hasCookie = 0;           // shimmy
        $_SESSION['username'] = "Guest";
        new SearchView($hasCookie);
    }
}

function handleSeating($date) {
    $DBM = new DBManager();

    $result = $DBM->processSeating($date);
}

function handleprocessCart() {
    $DBM = new DBManager();

    $result = $DBM->processCart();
}

function handledisplayFlightdetails($date, $route) {
    $DBM = new DBManager();

    $result = $DBM->processdisplayFlightdetails($date, $route);
}

?>