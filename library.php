<?php

abstract class OutsideView {

    function top($info) {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"mystyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Header</h1>
		</div>
            
            ";
    }

    public function menu($info) {
        //         echo "here";
        //         echo $_COOKIE["username"];
        if (isset($_COOKIE["username"]) || $info) {
            echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=logout\">Logout</a> &nbsp;                
                   
            </div>


            ";
        } else {
            echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>


            ";
        }
    }

    public function bloggerList() {
        echo "
                 <div id=\"bloggerlist\">
                    <h3> Routes  - open period for selected route </h3>";

        //                $DBM = new DBManager();
        //                $DBM->retrieveallblogsanddisplay();  

        echo "</div>"
        ;
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

class InsideView {

    public function __construct($info) {
        $this->top();
        $this->menu();
        $this->content($info);
        $this->bloggerList();





        $this->bottom();
    }

    public function content($info) {

        echo " 

	<div id=\"content\">
                  <h1> Add a post!!</h1>
                  <FORM METHOD=\"post\" ACTION=\"controller.php\">

                 
                        <input type=\"hidden\" name=\"cmd\" value=\"addPost\">
                       // <textarea>
                       <textarea name=\"textarea\" ROWS=6 COLS=50>
                        Add post here!
                        </textarea>

                            
        
                <input type=\"submit\" value=\"addPost\">
            </FORM>
              
                
            </div>
            ";
    }

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"insidestyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Header</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=login\">Add</a> <br>               
                       <a href=\"controller.php?cmd=register\">Delete</a><br>
                       <a href=\"controller.php?cmd=register\">logout</a><br>
                       
            </div>


            ";
    }

    public function bloggerList() {


        echo "
                 <div id=\"bloggerlist\">               
                    <h3> blogger list </h3>";
        //echo "in bloggerlist";
        // $DBM = new DBManager();
        //  $DBM->retrieveblogs();
        // get the blogs from the database
        /*               $query = "select * from post";
          $resultSet = $this->db->query($query);


          for($i=0;$i<$resultSet->rowCount();$i++){

          echo " here at least";
          $blogger = $resultSet->fetch();

          echo "<a href=\"controller.php?cmd=openblog\"> blogger['bloggerid']</a><br>";

          //           if ($username == $blogger['username']){

          }
         */


        echo "</div>";
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

class loginView extends OutsideView {

    public function __construct($info) {
        $this->top($info);
        $this->menu($info);
        //     $this->bloggerList();


        $this->content();


        $this->bottom();
    }

    public function menu($info) {
        echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=\"\"\"> << Back    </a>&nbsp;
                <a href=\"controller.php?cmd=login\">Login</a> &nbsp;               
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>


            ";
    }

    public function content() {

        echo "

	<div id=\"content\">
                  <h1> login </h1>
                   <FORM METHOD=\"post\" ACTION=\"controller.php\">

                 
                        <input type=\"hidden\" name=\"cmd\" value=\"loginRequest\">
                
                Username: <input type=\"text\" name=\"username\"> <br>
                Password: <input type=\"password\" name=\"password\"> <br>
                <input type=\"submit\"\ value=\"loginRequest\">
            </FORM>

                
            </div>
            ";
    }

    function top($info) {

        echo "<html> 
                    <head><link rel=\"stylesheet\" href=\"mystyles.css\">
                   </head>
                    <body>
                    <H1>Welcome to PHP Airlines.com</H1>
                ";
    }

}

class adminView extends InsideView {

    public function __construct($info) {
        $this->top();
        $this->menu();
        //    $this->bloggerList();


        $this->content($info);
        $this->bloggerList();

        $this->bottom();
    }

    public function content($info) {
        echo "<div id=\"content\">
                  <h1> Administrator  -Edit/Delete Routes</h1>
                  <FORM METHOD=\"post\" ACTION=\"controller.php\">
                    <input type=\"hidden\" name=\"cmd\" value=\"deleteRoutes\">
                   
                    <input type=\"hidden\" name=\"blogtitle\" value=>";
        $DBM = new DBManager();
        $DBM->displayRoutes();

        echo"     <input type=\"submit\" value=\"delete routes\">
                    
            </FORM>
           ";

        echo "</div>";
    }

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"insidestyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Aireline.com</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">             
                       <a href=\"controller.php?cmd=addRoutes\">Add <br> Route</a><br>
                       <a href=\"controller.php?cmd=manifest\">View<br> Manifest</a><br>
                   
                       <a href=\"controller.php?cmd=logout\">logout</a><br>
                       
            </div>


            ";
    }

    /*     <a href=\"controller.php?cmd=viewFlightDetails\">View<br> Flight<br> Details</a><br> */

    public function bloggerList() {
        
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

class adminEditView extends InsideView {

    public function __construct($info) {
        $this->top();
        $this->menu();
        //    $this->bloggerList();


        $this->content($info);
        $this->bloggerList();

        $this->bottom();
    }

    public function content($info) {
        echo "<div id=\"content\">
                  <h1> Administrator  -Edit Route# {$info} </h1>
                  <FORM METHOD=\"post\" ACTION=\"controller.php\">
                    <input type=\"hidden\" name=\"cmd\" value=\"amendroute\">
                   
                    <input type=\"hidden\" name=\"index\" value=$info>";
        $DBM = new DBManager();
        $DBM->displayEditRoutes($info);

        echo"     <input type=\"submit\" value=\"editPrice\">
                    
            </FORM>
           ";

        echo "</div>";
    }

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"insidestyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Aireline.com</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">             
                       <a href=\"controller.php?cmd=addRoutes\">Add <br> Route</a><br>
                       <a href=\"controller.php?cmd=suspendUsers\">View<br> Manifest</a><br>
                       <a href=\"controller.php?cmd=logout\">logout</a><br>
                       
            </div>


            ";
    }

    public function bloggerList() {
        
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

class adminAddRoute extends InsideView {

    public function __construct($info) {
        $this->top();
        $this->menu();
        //    $this->bloggerList();


        $this->content($info);
        $this->bloggerList();

        $this->bottom();
    }

    public function content($info) {
        echo "<div id=\"content\">
                  <h1> Administrator  -Add Route# - max. 8 </h1>
                  <FORM METHOD=\"post\" ACTION=\"controller.php\">
                    <input type=\"hidden\" name=\"cmd\" value=\"addRoute\">
                   
                    <input type=\"hidden\" name=\"index\" value=$info>";
        $DBM = new DBManager();
        $DBM->displayStaticRoutes($info);
        echo "<table>
                    <tr>
                        <td>Source:</td>
                        <td><input type=\"text\" name=\"source\"> </td>

                    </tr>
                    <tr>
                        <td>Destination:</td>
                        <td><input type=\"text\" name=\"destination\"></td>
                    </tr>
                    <tr>
                        <td>Operational from:</td>
                        <td><input type=\"date\" name=\"operationalFrom\"></td>
                    </tr>
                   <tr> <td>e.g. 01-Jan-2014</td> </tr>
                    <tr>
                        <td>Operational to:</td>
                        <td><input type=\"date\" name=\"operationalTo\"></td>
                    </tr>
                    <tr> <td>  </td> </tr>
                    <tr> <td>e.g. 01-Feb-2014</td> </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type=\"number\" name=\"Price\"></td>
                    </tr>
                    <tr>
                        <td><input type=\"submit\" value=\"addRoute\"></td>
                        <td></td>

                    </tr> 
                    
                
            </div>
            </form>
            ";


        echo"  </FORM>
           ";

        echo "</div>";
    }

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"insidestyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Aireline.com</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">             
                       <a href=\"controller.php?cmd=defaultAdmin\">Edit <br> Route</a><br>
                       <a href=\"controller.php?cmd=suspendUsers\">View<br> Manifest</a><br>
                       <a href=\"controller.php?cmd=logout\">logout</a><br>
                       
            </div>


            ";
    }

    public function bloggerList() {
        
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

/*
  class adminFlightDetails extends InsideView{
  public function __construct($info){
  $this->top();
  $this->menu();
  //    $this->bloggerList();


  $this->content($info);
  $this->bloggerList();

  $this->bottom();


  }

  public function content($info){
  echo "<div id=\"content\">
  <h1> Administrator  -Add Route# - max. 8 </h1>
  <FORM METHOD=\"post\" ACTION=\"controller.php\">
  <input type=\"hidden\" name=\"cmd\" value=\"addRoute\">

  <input type=\"hidden\" name=\"index\" value=$info>";
  $DBM = new DBManager();
  $DBM->displayStaticRoutes($info);
  echo "<table>
  <tr>
  <td>Source:</td>
  <td><input type=\"text\" name=\"source\"> </td>

  </tr>
  <tr>
  <td>Destination:</td>
  <td><input type=\"text\" name=\"destination\"></td>
  </tr>
  <tr>
  <td>Operational from:</td>
  <td><input type=\"date\" name=\"operationalFrom\"></td>
  </tr>
  <tr> <td>e.g. 01-Jan-2014</td> </tr>
  <tr>
  <td>Operational to:</td>
  <td><input type=\"date\" name=\"operationalTo\"></td>
  </tr>
  <tr> <td>  </td> </tr>
  <tr> <td>e.g. 01-Feb-2014</td> </tr>
  <tr>
  <td>Price:</td>
  <td><input type=\"number\" name=\"Price\"></td>
  </tr>
  <tr>
  <td><input type=\"submit\" value=\"addRoute\"></td>
  <td></td>

  </tr>


  </div>
  </form>
  ";


  echo"  </FORM>
  ";

  echo "</div>";



  }



  function top(){


  echo "

  <html>

  <head>

  <link rel=\"stylesheet\" href=\"insidestyles.css\">
  </head>

  <body>

  <div id=\"main\">
  <div id=\"header\">
  <h1>Aireline.com</h1>
  </div>

  ";

  }

  public function menu(){
  echo "
  <div id=\"menu\">
  <a href=\"controller.php?cmd=defaultAdmin\">Edit <br> Route</a><br>
  <a href=\"controller.php?cmd=suspendUsers\">View<br> Manifest</a><br>
  <a href=\"controller.php?cmd=logout\">logout</a><br>

  </div>


  ";


  }

  public function bloggerList(){





  }

  function bottom(){
  echo "
  </div>

  </body>
  </html>
  ";
  }
  } */

class adminManifest extends InsideView {

    public function __construct($info) {
        $this->top();
        $this->menu();
        //    $this->bloggerList();


        $this->content($info);
        $this->bloggerList();

        $this->bottom();
    }

    public function content($info) {
        echo "<div id=\"content\">
                  <h1> Administrator  -Display flights by date # - </h1>
                  <FORM METHOD=\"post\" ACTION=\"controller.php\">
                    <input type=\"hidden\" name=\"cmd\" value=\"viewFlightdetails\">
                   
                    <input type=\"hidden\" name=\"index\" value=$info>";
        $DBM = new DBManager();
        $DBM->displayActiveRoutes($info);
        echo "<table>
                    <tr>
                        <td> 
                    <tr>
                        <td><input type=\"submit\" value=\"addRoute\"></td>
                        <td></td>

                    </tr> 
                    
                
            </div>
            </form>
            ";


        echo"  </FORM>
           ";

        echo "</div>";
    }

    function top() {


        echo "
            
            <html>

            <head>

	<link rel=\"stylesheet\" href=\"insidestyles.css\">
            </head>

            <body>

	<div id=\"main\">
		<div id=\"header\">
			<h1>Aireline.com</h1>
		</div>
            
            ";
    }

    public function menu() {
        echo "
                 <div id=\"menu\">             
                       <a href=\"controller.php?cmd=defaultAdmin\">Edit <br> Route</a><br>
                       <a href=\"controller.php?cmd=manifest\">View<br> Manifest</a><br>
                       <a href=\"controller.php?cmd=logout\">logout</a><br>
                       
            </div>


            ";
    }

    public function bloggerList() {
        
    }

    function bottom() {
        echo "
            </div>

            </body>
            </html>        
            ";
    }

}

class registerView extends OutsideView {

    public function __construct() {
        $info = 0;
        $this->top($info);
        $this->menu($info);
        //       $this->bloggerList();


        $this->content();


        $this->bottom();
    }

    public function menu($info) {
        echo "
                 <div id=\"menu\">
                <a href=\"controller.php\"> << Back    </a>&nbsp;
                <a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>


            ";
    }

    public function content() {

        echo "

	<div id=\"content\">
                  <h1> Register </h1>
                    <form action=\"controller.php\" method=\"post\">
                <input type=\"hidden\" name=\"cmd\" value=\"registerRequest\">
                <table>
                    <tr>
                        <td>username:</td>
                        <td><input type=\"text\" name=\"username\"> </td>

                    </tr>
                    <tr>
                        <td>password:</td>
                        <td><input type=\"password\" name=\"password\"></td>
                    </tr>
                    <tr>
                        <td>e-mail address:</td>
                        <td><input type=\"email\" name=\"email\"></td>
                    </tr>
                   
                    <tr>
                        <td>Credit Card No:</td>
                        <td><input type=\"text\" name=\"CreditCardNo\"></td>
                    </tr>
                    <tr>
                        <td>Passport No:</td>
                        <td><input type=\"text\" name=\"PassportNo\"></td>
                    </tr>
                    <tr>
                        <td><input type=\"submit\" value=\"Submit\"></td>
                        <td></td>

                    </tr> 
                    
                
            </div>
            </form>
            ";
    }

    function top($info) {

        echo "<html> 
                    <head><link rel=\"stylesheet\" href=\"mystyles.css\">
                   </head>
                    <body>
                    <H1>Welcome to PHP Airlines.com</H1>
                ";
    }

}

class Cart {

    private $cartElements = array();
    private $cartID = 0;

    // don't forget to remove from cart if undelete item,from process list

    function addToCart($ticketInfo) {

        // adding a numeric key to the cardElements array
        $this->cartElements[$this->cartID] = $ticketInfo;
        $this->cartID++;
    }

    function deleteFromCart($cartID) {
        unset($this->cartElements[$cartID]);
    }

    /*
      function updateTransactions($username,$email,$CreditCardNo,$PassportNo){
      $DBM = new DBManager();

      $cartIds = array_keys($this->cartElements);


      for($i=0;$i<sizeof($cartIds);$i++){
      $cartID = $cartIds[$i];
      // another loop here
      $nmrSeats=$this->cartElements[$cartID]['seatCount'];
      $seatNumber=$this->cartElements[$cartID]['seatCount'];

      $DBM->processTransaction($username,$email,$CreditCardNo,$PassportNo,$this->cartElements[$cartID]['route'],$this->cartElements[$cartID]['date'],$this->cartElements[$cartID]['seatCount']);
      unset($this->cartElements[$cartID]);
      }
      }
     */

    //put in the form here for the loops
    // put '2' in for the changes made by user
    function updateTransactions($username, $email, $CreditCardNo, $PassportNo) {
        $DBM = new DBManager();

        $cartIds = array_keys($this->cartElements);


        for ($i = 0; $i < sizeof($cartIds); $i++) {
            $cartID = $cartIds[$i];
            $nmrSeats = $this->cartElements[$cartID]['seatCount'];
            $seatNumbers = $this->cartElements[$cartID]['seatCount'];
            for ($j = 0; $j < 20; $j++) {
                //    echo "<br> checking cart setting".$this->cartElements[$cartID]['seats'][$j];
                if ("{$this->cartElements[$cartID]['seats'][$j]}" == "U") {
                    $DBM->processTransaction($username, $email, $CreditCardNo, $PassportNo, $this->cartElements[$cartID]['route'], $this->cartElements[$cartID]['date'], $j);
                    $this->cartElements[$cartID]['seats'][$j] = "Y";
                    $seatNumbers--;
                }
                if ($seatNumbers == 0)
                    break;
            }
            for ($i = 0; $i < sizeof($cartIds); $i++) {
                unset($this->cartElements[$cartID]);
            }
        }
    }

    function displayCart() {

        $cartIds = array_keys($this->cartElements);


        for ($i = 0; $i < sizeof($cartIds); $i++) {

            $cartID = $cartIds[$i];


            echo "<p style=\"border:red solid 1px\">";



            echo "Route: " . $this->cartElements[$cartID]['route'] . "<br>";

            echo "date: " . $this->cartElements[$cartID]['date'] . "<br>";
            echo "Number of seats: " . $this->cartElements[$cartID]['seatCount'] . "<br>";


            echo "Occupied Seats:  " . $this->cartElements[$cartID]['freeSeats'] . "<br>";
            echo "<BR> First {$this->cartElements[$cartID]['seatCount']} seats selected will be chosen <BR>";
            $count = 0;
            for ($j = 0; $j < 20; $j++) {
                $dummy1 = $i . "b" . $j;
                echo $dummy1;
                $seats1 = $this->cartElements[$cartID]['seats'];
                //          if ($seats1[$j]=="Y")|| ($seats1[$j]=="U"))
                if (($this->cartElements[$cartID]['seats'][$j] == "Y") || ($this->cartElements[$cartID]['seats'][$j] == "U")) {

                    echo "<input type=\"radio\" name=\"$dummy1\" value=\"Y\" checked >";
                    echo "<input type=\"radio\"name=\"$dummy1\" value=\"N\"disabled>";
                    $count++;
                } else {

                    echo "<input type=\"radio\" name=\"$dummy1\" value=\"Y\" >";
                    echo "<input type=\"radio\"name=\"$dummy1\" value=\"N\" checked>";
                }
                /* if(( $j % 4)==0) */
                echo "<br>";
            }
            if ($count == 20)
                echo "<br> ---- FLIGHT BOOKED OUT -- ";



            echo '<a href="controller.php?cmd=delCheckoutItem&cartID=' . $cartID . '">delete</a>';


            echo "</p>";
        }
        echo "<br><a href=\"controller.php\">Back to search</a>";
        //      echo "<br><a href=\"controller.php?cmd=purchase\">Continue with purchase</a> &nbsp;";
        //     echo '<a href="controller.php?cmd=delCheckoutItem&cartID='.$cartID.'">delete</a>';
        //         print_r($this->cartElements); 
        echo "</p>";
    }

    /* --------  PUT IN SUBMIT BUTTON HERE ---, LINK TO USER DETAILS */

    function processFromCart() {


        $cartIds = array_keys($this->cartElements);

        //need to compare both clicked and updated    
        for ($i = 0; $i < sizeof($cartIds); $i++) {
            $cartID = $cartIds[$i];
            $nmrSeats = $this->cartElements[$cartID]['seatCount'];

            for ($j = 0; $j < 20; $j++) {
                $dummy1 = $i . "b" . $j;
                $seats1 = $this->cartElements[$cartID]['seats'];
                if ($this->cartElements[$cartID]['seats'][$j] == "Y") {
                    //       echo " <br> not changing -already Y";
                } else {
                    if ($_POST[$dummy1] == "Y") {
                        // echo the newly set Y, first of the settings
                        $this->cartElements[$cartID]['seats'][$j] = "U";


                        $nmrSeats--;
                    }
                    if ($nmrSeats == 0)
                        break;
                }
                //      print_r($this->cartElements);  
            }
        }
    }

}

class SearchView extends OutsideView {

    public function __construct($info) {

        $this->top($info);
        $this->menu($info);
        //    $this->bloggerList();
        $this->searchDiv();

        $this->bottom();
    }

    function searchDiv() {

        echo "<div id=\"content\">";
        echo "<a style=\"float:right;\" href=\"controller.php?cmd=checkoutView\">Go to checkout</a> &nbsp";
        echo "<div id=\"search\">
                <form action=\"controller.php\" method=\"post\">
                <input type=\"hidden\" name=\"cmd\" value=\"search\">
               
                <table>
                <tr>
                    <td>
                    Route:
                    </td>
                    <td>
                    <select name=\"route\" >
                   
               ";
        // need to get the route decsriptions and ids out of the database
        $DBM = new DBManager();
        $data = $DBM->getAllRoutes();

        for ($i = 0; $i < sizeof($data); $i++) {

            /*        echo "<option value=\"{$data[$i]['id']}\"> {$data[$i]['source']} - {$data[$i]['dest']}
              </option> "; */
            if ($data[$i]['id'] == $_SESSION['route'])
                echo "<option value=\"{$data[$i]['id']}\" selected> {$data[$i]['source']} - {$data[$i]['dest']}
                                      </option> ";
            else
                echo "<option value=\"{$data[$i]['id']}\"> {$data[$i]['source']} - {$data[$i]['dest']}
                                      </option> ";
        }

        echo "
                        </select>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                Number of tickets:   
                             </td>
                        <td>
                        <input type=\"text\" name=\"seatCount\" value=\"{$_SESSION['seatCount']}\" size=\"3\" >
                        </td
                    </tr>
                <tr>
                    <td> 
                        Select a date:
                    </td>
                        <td>
                        
                        <input id=\"startdate\" type=\"date\" name=\"date\" value=\"{$_SESSION['date']}\" >
                        </td>
                </tr>    
                
                <tr><td>
                        <input type=\"submit\" value=\"search\">
                </tr>    
                
                
                
            </table>
           
            
        </form>
        </div>
        ";
    }

    function top($hasCookie) {

        if ($hasCookie) {
            if (isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];
                echo "<html> 
                    <head><link rel=\"stylesheet\" href=\"mystyles.css\">
                   </head>
                    <body>
                    <H1>Welcome $username to PHP Airlines.com</H1>
          ";
            } else {
                $username = $_SESSION['username'];
                echo "<html> 
                    <head><link rel=\"stylesheet\" href=\"mystyles.css\">
                   </head>
                    <body>
                    <H1>Welcome  $username to PHP Airlines.com</H1> ";
            }
        } else {
            $username = $_SESSION['username'];
            echo "<html> 
                    <head><link rel=\"stylesheet\" href=\"mystyles.css\">
                   </head>
                    <body>
                    <H1>Welcome $username to PHP Airlines.com</H1> ";
        }
    }

    public function menu($info) {
        if ($info) {
            echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=logout\">Logout</a> &nbsp;                
                   
            </div>


            ";
        } else {
            echo "
                 <div id=\"menu\">
                <a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>


            ";
        }
    }

    function bottom() {
        echo "
            </body>
            </html>
         ";
    }

}

class ResultsView extends SearchView {

    private $route;
    private $seatCount;
    private $date;

    public function __construct($route, $seatCount, $date, $info) {

        $this->route = $route;
        $this->seatCount = $seatCount;
        $this->date = $date;
        //       $this->info=$info;
        //  $info=1;
        $this->top($info);
        $this->menu($info);
        $this->searchDiv();
        //     $this->bloggerList();
        $this->results();
        $this->bottom();
    }

    public function menu($info) {
        //       echo "here";
        //     echo $_COOKIE['username'];
        //      echo $info;
        $hasCookie = false;
        //      echo $_COOKIE['username'];
        if (isset($_COOKIE['username'])) {
            // only create the cart when the session starts
            $hasCookie = true;
        }



        echo "<div id=\"menu\">";

        if ($hasCookie) {
            echo "
                <a href=\"controller.php?cmd=logout\">Logout</a> &nbsp;                
                   
            </div> ";
        } else {
            echo "<a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>";
        }
    }

    public function results() {

        //echo "<br><br><br>";
        //echo  $this->route." ".$this->ticketCount." ".$this->date."<br>";
        // set-up list of dates

        $DBM = new DBManager();
        $routeData = $DBM->getRoute($this->route);

        $startDate = new DateTime($routeData[0]['start']);
        $endDate = new DateTime($routeData[0]['end']);



        echo "start: " . $startDate->format('d-M-Y') . " end: " . $endDate->format('d-M-Y') . "<br><br>";

        $dates = array();

        $searchDate = new DateTime($this->date);
        // go back to days
        //$searchDate->sub(new DateInterval('P2D'));
        //$dates[-2]= clone $searchDate;
        //echo $dates[-2]->format('d-M-Y')."<br>";

        echo "<div>";
        echo "<form action=\"controller.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"cmd\" value=\"addToCart\">";
        //        echo "<br><a href=\"controller.php?cmd=purchase\">Continue with purchase</a> &nbsp;";
//            echo $info;
        //      echo "<input type=\"hidden\" name=\"info1\" value={$info}>";
        $temp = 0;
        for ($i = -2; $i < 3; $i++) {


            if ($i == -2) {
                $searchDate->sub(new DateInterval('P2D'));
            } else {
                $searchDate->add(new DateInterval('P1D'));
            }

            $dates[$i] = clone $searchDate;



            // check against the operation date
            if (($dates[$i]->getTimestamp() < $startDate->getTimestamp()) ||
                    ($dates[$i]->getTimestamp() > $endDate->getTimestamp())) {

                echo $dates[$i]->format('d-M-Y') . " not operating <br>";
            } else {
                // the route is operational on this date
                // must go to database to see if there are enough seats for $seatCount
                // checkSeat returns a boolean 


                if ($DBM->checkSeats($dates[$i]->format('Y-m-d'), $this->route, $this->seatCount)) {

                    $totalPrice = $this->seatCount * $routeData[0]['price'];


                    echo $dates[$i]->format('d-M-Y') . "  $totalPrice";
                    if ($temp == 0) {
                        echo "<input type=\"radio\"  value=\"{$dates[$i]->format('Y-m-d')}\"name=\"flightDate\" checked>";
                        echo "<a href=\"controller.php?cmd=viewdate&amp;dateid={$dates[$i]->format('Y-m-d')}\"> \"{$dates[$i]->format('Y-m-d')}\"</a><br>";
                        $temp++;
                    } else {
                        echo "<input type=\"radio\" name=\"flightDate\" value=\"{$dates[$i]->format('Y-m-d')}\">";
                        echo "<a href=\"controller.php?cmd=viewdate&amp;dateid={$dates[$i]->format('Y-m-d')}\"> \"{$dates[$i]->format('Y-m-d')}\"</a><br>";
                    }
                } else {
                    echo $dates[$i]->format('d-M-Y') . " Not enough seats <br>";
                }
            }
        }

        if (!$temp)
            echo "<input type=\"submit\" value=\"Add to Cart\" disabled>";
        else
            echo "<input type=\"submit\" value=\"Add to Cart\">";
        echo "</form></div>";
    }

}

class purchaseView extends SearchView {

    public function __construct($hasCookie) {



        $this->top($hasCookie);
        $this->menu($hasCookie);
        $this->getUserdetails($hasCookie);

        $this->bottom();
    }

    public function menu($info) {

        $hasCookie = false;

        if (isset($_COOKIE['username'])) {
            $hasCookie = true;
        }



        echo "<div id=\"menu\">";

        if ($hasCookie) {
            echo "
                <a href=\"controller.php?cmd=logout\">Logout</a> &nbsp;                
                   
            </div> ";
        } else {
            echo "<a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>";
        }
    }

    public function getUserdetails($hasCookie) {
        $hasCookie = false;
        //      echo $_COOKIE['username'];
        if (isset($_COOKIE['username'])) {
            // only create the cart when the session starts
            $hasCookie = true;
        }

        //      $info1=$info;
        echo "<div id=\"content\">";
        //      echo   "<a style=\"float:right;\" href=\"controller.php?cmd=checkoutView\">Go to checkout</a> &nbsp";
        //      echo "<a href=\"controller.php?cmd=login\">Login</a> &nbsp;";<a href
        if (!$hasCookie) {

            echo" <h1> Ticket/Purchasing Details </h1>
                    <form action=\"controller.php\" method=\"post\">
                <input type=\"hidden\" name=\"cmd\" value=\"customerRequest\">
                <table>
                    <tr>
                        <td>Name to be printed on ticket:</td>
                        <td><input type=\"text\" name=\"username\"> </td>

                    </tr>
                   
                    <tr>
                        <td>e-mail address:</td>
                        <td><input type=\"email\" name=\"email\"></td>
                    </tr>
                   
                    <tr>
                        <td>Credit Card No:</td>
                        <td><input type=\"text\" name=\"CreditCardNo\"></td>
                    </tr>
                    <tr>
                        <td>Passport No:</td>
                        <td><input type=\"text\" name=\"PassportNo\"></td>
                    </tr>
                    <tr>
                        <td><input type=\"submit\" value=\"Submit\"></td>
                        <td></td>

                    </tr> 
                    
                
            </div>
            </form>
            ";
        } else {
            echo "we need to reteive data from db,display for editing";
            $DBM = new DBManager();

            $customerDetails = $DBM->handleretrieveCustomerdetails();
        }




        echo "</div>";
    }

}

class CheckoutView extends SearchView {

    private $route;
    private $seatCount;
    private $date;

    public function __construct($info) {

        $this->top($info);
        $this->menu($info);
        //     $_SESSION['cart']->displayCart();
        $this->searchDiv();
        $this->bottom();
    }

    public function menu($info) {

        $hasCookie = false;

        if (isset($_COOKIE['username'])) {
            // only create the cart when the session starts
            $hasCookie = true;
        }



        echo "<div id=\"menu\">";

        if ($hasCookie) {
            echo "
                <a href=\"controller.php?cmd=logout\">Logout</a> &nbsp;                
                   
            </div> ";
        } else {
            echo "<a href=\"controller.php?cmd=login\">Login</a> &nbsp;                
                       <a href=\"controller.php?cmd=register\">Register</a>
            </div>";
        }
    }

    function searchDiv() {


        //      $info1=$info;
        echo "<div id=\"content\">
                     <form action=\"controller.php\" method=\"post\">
            
                     <input type=\"hidden\" name=\"cmd\" value=\"Update\">
                       <table>
                        <tr>
                        <td> </td>

                       </tr>";
        $_SESSION['cart']->displayCart();


        echo"   <tr>
             <td><input type=\"submit\" value=\"Seat Changes\"></td>
                 </tr>
              </div>
            </form>
            ";
    }

}

//$_SESSION['cart']->displayCart();


class DBManager {

    private $db;

    public function __construct() {

        $address = 'mysql:host=localhost:3306;dbname=airline2013';
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO($address, $username, $password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
        }
    }

    public function processLogin($username, $password) {

        // get the login details and query database


        $query = "select * from user";

        $resultSet = $this->db->query($query);

        while ($row = $resultSet->fetch()) {

            if (($row['username'] == $username) && ($row['password'] == $password)) {
                if ($username == "rmiller") {
                    return "rmiller";
                } else {
                    return "user";
                }
            }
        }

        return "invalid";
    }

    public function addUser(&$hasCookie) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $CreditCardNo = $_POST['CreditCardNo'];

        $PassportNo = $_POST['PassportNo'];
        $suspend = 0;

        $user = array();
        $data = array();

        $query = "INSERT INTO user (username,password,email,CreditCardNo,passport,suspend)
                            VALUE ('$username','$password','$email','$CreditCardNo',{$PassportNo},{$suspend})";
        $result = $this->db->exec($query);


        $query1 = "select * from user";


        $resultSet = $this->db->query($query1);

        $id = 0;
        for ($i = 0; $i < $resultSet->rowCount(); $i++) {


            $user = $resultSet->fetch();


            if ($username == $user['username']) {

                $id = $user['id'];

                $data['id'] = $id;
            }
        }
        setCookie('username', $_POST['username'], time() + 3600, '/');
        $hasCookie = 1;           // shimmy
        $_SESSION['username'] = $_POST['username'];




        $date['email'] = $email;
        $data['CreditCardNo'] = $CreditCardNo;
        $data['username'] = $username;
        $data['id'] = $id;
        //      return $id;
        return $data;
    }

    public function updateRoute($value, $index) {

        $query = "update routes set price={$value} where id={$index}";
        $resultSet = $this->db->query($query);
    }

    public function checkSeats() {
        return true;
    }

    public function getAllRoutes() {
        $query = "select * from routes";

        //db is a PDO object
        $resultSet = $this->db->query($query);

        return $resultSet->fetchAll();
    }

    function getRoute($id) {
        $query = "select * from routes where id=$id";

        //db is a PDO object
        $resultSet = $this->db->query($query);

        return $resultSet->fetchAll();
    }

    public function loadRoutes() {

        $query = "INSERT INTO routes 
                                (source, dest, start, end, price) 
                                VALUE ('Cork','London', '2014-01-01','2014-01-31',100)";

        $count = $this->db->exec($query);





        $query = "INSERT INTO routes 
                                (source, dest, start, end, price) 
                                VALUE ('Cork','Berlin', '2014-02-01','2014-02-28',100)";

        $count = $this->db->exec($query);
    }

    public function displayRoutes() {

        $query = "select DISTINCT * from routes";
        $resultSet = $this->db->query($query);
        echo "Delete routes \t\t (click to edit) <br>";
        echo " Y\tN <br>";

        for ($i = 0; $i < $resultSet->rowCount(); $i++) {
            $route = $resultSet->fetch();
            //     echo "{$user['username']} {$user['password']} <br>";  
            // echo "<input type=checkbox name={$route['source']} value={$route['source']}> {$route['source']}{$route['dest']}{$route['start']} - {$route['end']}  {$route['price']} <br>";
            /* echo " <input type=\"text\" name=\"firstname\" value={$route['source']}> 
              <input type=\"text\" name=\"firstname\" value={$route['dest']}>
              <input type=\"text\" name=\"firstname\" value={$route['start']}>
              <input type=\"text\" name=\"firstname\" value={$route['end']}>
              <input type=\"text\" name=\"firstname\" value={$route['price']}>
              <br>"; */
            $dummy = "route #" . $route['id'] . "  " . $route['source'] . "  " . $route['dest'] . "  " . $route['start'] . "  " . $route['end'] . "  " . $route['price'] . " <br>";
            $dummy1 = "r" . $i;
            echo "<input type=\"radio\" name=\"$dummy1\" value=\"Y\" >";
            echo "<input type=\"radio\"name=\"$dummy1\" value=\"N\" checked>";
            echo "<a href=\"controller.php?cmd=editroute&amp;routeid={$route['id']}\"> $dummy       </a><br>";
            //  echo $dummy."<br> ";    
        }
        return $resultSet;
    }

    public function displayStaticRoutes() {

        $query = "select * from routes";
        $resultSet = $this->db->query($query);
        for ($i = 0; $i < $resultSet->rowCount(); $i++) {
            $routes = $resultSet->fetch();
            echo " <textarea name=\"textarea\" ROWS=6 COLS=50>";
            echo "\n  Source:   {$routes['source']}";
            echo "\n    Dest:   {$routes['dest']}";
            echo "\n   Start:   {$routes['start']}";
            echo "\n     End:   {$routes['end']}";
            echo "\n   Price:   {$routes['price']}";
            echo " </textarea>";
        }
    }

    public function displayActiveRoutes($info) {

        $query = "select DISTINCT route,date from passangers order by date";
        $resultSet = $this->db->query($query);

        for ($i = 0; $i < $resultSet->rowCount(); $i++) {
            $passangers = $resultSet->fetch();
            $dummy = "{$passangers['route']} {$passangers['date']}";
            echo "<a href=\"controller.php?cmd=openflight&amp;routeid={$passangers['route']}&amp;dateid={$passangers['date']}\"> $dummy</a><br>";

            /*   echo " <textarea name=\"textarea\" ROWS=6 COLS=50>";                 
              echo "Source:      {$route['source']} \nDestination: {$route['dest']}&nbsp;\nStart:       {$route['start']} &nbsp\nEnd:         {$route['end']}&nbsp;\nPrice:       {$route['price']}";
              echo " </textarea><br><br>" ;
             * var=value&var2=value2"
             */
        }
    }

    public function displayEditRoutes($info) {

        $query = "select DISTINCT * from routes";
        $resultSet = $this->db->query($query);

        for ($i = 0; $i < $resultSet->rowCount(); $i++) {
            $route = $resultSet->fetch();
            if ($route['id'] == $info) {
                echo " <textarea name=\"textarea\" ROWS=6 COLS=50>";
                echo "Source:      {$route['source']}\nDestination: {$route['dest']}\nStart:       {$route['start']} \nEnd:         {$route['end']}";
                echo " </textarea><br>";
                echo "Edit pricing on route \t\t <br>";
                echo "Price: <input type=\"text\" name=\"firstname\" value=\" {$route['price']}\"><br>";
            }
        }
    }

    function deleteRoutes() {


        $query = "select * from routes";
        $resultSet = $this->db->query($query);

        for ($i = 0; $i < $resultSet->rowCount(); $i++) {
            $route = $resultSet->fetch();
            if ($_POST['r' . $i] == "Y") {
                $dummy1 = $route['id'];
                $query1 = "delete routes from routes where id = $dummy1";
                $resultSet1 = $this->db->query($query1);
            } else {
                //                      echo " Not Removing record index".$i." value".$_POST['b'.$i]."from database <br>";  
            }
        }
    }

    public function addRoute($source, $destination, $fromDate, $toDate, $price) {
        //  echo "/n".$fromDate;
        $from1 = $fromDate->format('Y-M-D');

        $to1 = $toDate->format('d-M-Y');
        $date = DateTime::createFromFormat('d/m/Y', "24/04/2012");
        echo $date->format('Y-m-d');
        $date1 = $fromDate->format('Y-m-d');
        $date2 = $toDate->format('Y-m-d');



        //  echo $price;

        /*  $query = "INSERT INTO routes 
          (source, dest, start, end, price)
          VALUE ($source,$destination,$from1,$to1,$price)"; */
        $query = "INSERT INTO routes 
                               (source, dest, start, end, price) 
                                VALUE ('$source','$destination','$date1','$date2',$price)";

        $count = $this->db->exec($query);
    }

    public function checkNmrroutes() {

        $query = "select * from routes";
        $resultSet = $this->db->query($query);
        return $resultSet->rowCount();
    }

    public function handleretrieveCustomerdetails() {

        $query = "select * from user";
        $resultSet = $this->db->query($query);

        for ($i = 0; $i < $resultSet->rowCount(); $i++) {


            $customer = $resultSet->fetch();

            if ($_COOKIE['username'] == $customer['username']) {
                //        echo $customer['username'];  
                echo" <h1> Ticket/Purchasing Details </h1>
                        <form action=\"controller.php\" method=\"post\">
                        <input type=\"hidden\" name=\"cmd\" value=\"customerRequest\">
                         <table>
                         <tr>
                  '      <td>Name as per records:</td>
                        <td><input type=\"text\" name=\"username\" value=\"{$customer['username']}\"> </td>

                         </tr>
                   
                      <tr>
                        <td>e-mail address:</td>
                        <td><input type=\"email\" name=\"email\" value=\"{$customer['email']}\"></td>
                        </tr>
                   
                      <tr>
                        <td>Credit Card No:</td>
                        <td><input type=\"text\" name=\"CreditCardNo\" value=\"{$customer['CreditCardNo']}\"></td>
                       </tr>
                        <tr>
                        <td>Passport No:</td>
                        <td><input type=\"text\" name=\"PassportNo\" value=\"{$customer['passport']}\"></td>
                     </tr>
                     <tr>
                        <td><input type=\"submit\" value=\"Submit\"></td>
                        <td></td>

                    </tr> 
                    
                
            </div>
            </form>
            ";
            }
        }
    }

    public function processTransaction($username, $email, $CreditCardNo, $PassportNo, $route, $date, $seatNo) {



        $hasCookie = 0;
        $registerName = $_SESSION['username'];
        //      echo$registerName=$_SESSION['username'];

        if (isset($_COOKIE['username'])) {
            // only create the cart when the session starts
            $hasCookie = 1;
            $registerName = $_COOKIE['username'];
        } else {
            $registerName = $_SESSION['username'];
            $hasCookie = 0;
        }

        echo "<br> username:" . $username;
        echo "<br> pp: " . $PassportNo;
        echo "<br> route:" . $route;
        echo "<br> date:" . $date;
        echo "<BR> hascookie" . $hasCookie;
        echo "<br> Registered Name: " . $registerName;
        echo "<br> Credit Card " . $CreditCardNo;
        echo "<br> email :" . $email;
        echo "<br> Seat Number: b" . $seatNo;



        $query = "INSERT INTO passangers (name, passport,route,date,registered,registeredName,creditCardno,email,seatNo)
                            VALUE ('$username','$PassportNo',{$route},'$date',{$hasCookie},'$registerName','$CreditCardNo','$email',{$seatNo} )";
        $this->db->exec($query);
        echo "<br><a href=\"controller.php\">Back to search</a>";
        /* */
        /*  */
    }

    public function processSeating($date) {
        $seats = array(
            0, 0, 0, 0, 0,
            0, 0, 0, 0, 0,
            0, 0, 0, 0, 0,
            0, 0, 0, 0, 0
        );
        $Total = 0;
        $query1 = "select * from passangers ";
        $resultSet = $this->db->query($query1);
        $Size = $resultSet->rowCount();

        echo " <textarea name=\"textarea\" ROWS=6 COLS=50>";
        echo "\nDate";
        echo "\t\tRoute";
        echo "\t\t    seat Occupied";
        for ($i = 0; $i < $Size; $i++) {
            $result = $resultSet->fetch();
            //  echo "<br>".$result['date'];
            if (($result['date'] == $date) && ($result['route'] == $_SESSION['route'])) {
                echo "\n" . $result['date'];
                echo "\t" . $result['route'];
                echo "\t\t\t" . $result['seatNo'];
                $dummy = $result['seatNo'];
                $seats[$dummy] = 1;
                $Total++;
            }
        }

        if ($Total == 0) {
            $seatAvailable = 0;

            echo "\n\n Empty set - any seat is yours";
        }
        if ($Total == 20) {
            echo " \n\n Flight full";
            $seatAvailable = 20;
        } else {
            $seatsAvailable = 20 - $Total;
        }

        echo "\n\n Seats available:    {$seatsAvailable} ";


        echo " </textarea>";
        echo "<br><br> Seats available:    {$seatsAvailable} ";
        // print_r($seats);
    }

    public function processSeating1($date, $nmrSeats, &$seats, &$freeSeats) {

        $Total = 0;
        $query1 = "select * from passangers ";
        $resultSet = $this->db->query($query1);
        $Size = $resultSet->rowCount();

        for ($i = 0; $i < $Size; $i++) {
            $result = $resultSet->fetch();
            //  echo "<br>".$result['date'];
            if (($result['date'] == $date) && ($result['route'] == $_SESSION['route'])) {

                $dummy = $result['seatNo'];
                $seats[$dummy] = "Y";
                $Total++;
            }
        }

        /*    print_r($seats);  */
        $freeSeats = 20 - $Total;
    }

    public function processdisplayFlightdetails($date, $route) {
        echo "<br> Route: " . $route;
        echo "<br> Date:  " . $date;
        $query = "select * from routes where id={$route} ";
        $resultSet1 = $this->db->query($query);
        $prices1 = $resultSet1->fetch();
        $price = $prices1['price'];
        $flight = $prices1['source'] . "  -  " . $prices1['dest'];

        $query1 = "select * from passangers where date='$date' and route={$route} order by '$date'";
        $resultSet = $this->db->query($query1);
        $nmrCustomers = $resultSet->rowCount();
        echo "<br> Revenue for flight " . $price * $nmrCustomers;
        echo "<br> From '$flight' ";
        echo "<BR> Prices Per Ticket €" . $price;
        echo "<br> Total No. of Customers" . $nmrCustomers;
        for ($i = 0; $i < $nmrCustomers; $i++) {
            $passenger = $resultSet->fetch();
            echo "<br>" . $passenger['seatNo'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $passenger['name'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $passenger['passport'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $passenger['creditCardno'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $passenger['email'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $passenger['registered'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $passenger['registeredName'];
            ;
        }
    }

}
?>

