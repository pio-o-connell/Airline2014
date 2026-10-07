# PHP Airlines

## Airline Booking and Passenger Management System

**PHP Airlines** is a PHP/MySQL airline booking and passenger management system developed in **2014** as part of the **Higher Diploma in Cloud and Mobile with Data Science**.

The project provides a web-based system for searching airline routes, selecting flights and seats, managing bookings, and administering routes and flight manifests.

This repository contains the original coursework source and database from the 2014 project.

---

## Project Overview

PHP Airlines allows customers to:

* Search available airline routes
* Select a travel date
* Select the number of tickets required
* Check flight and seat availability
* Select seats
* Add flights to a shopping cart
* Review and modify provisional bookings
* Register as a customer
* Purchase tickets
* View their booking information

An administrator can:

* Log in to the administration area
* Add new routes
* Edit route prices
* Delete routes
* View flight manifests
* View individual flight details
* View passenger and seat information
* Calculate flight revenue

---

## Application Architecture

The application follows a simple controller/view/database architecture.

```text
                    Browser
                       |
                       v
                 controller.php
                       |
             Command / Request Routing
                       |
          +------------+------------+
          |                         |
          v                         v
      View Classes              DBManager
          |                         |
          |                         v
          |                    MySQL Database
          |                     airline2013
          |
          v
       HTML/CSS
```

The main application logic is contained in `library.php`, while `controller.php` acts as the central request router.

---

## Customer Booking Flow

The main customer workflow is:

```text
Search
  |
  v
Select Route
  |
  v
Select Number of Tickets
  |
  v
Select Date
  |
  v
View Flight Results
  |
  v
Check Available Seats
  |
  v
Add Flight to Cart
  |
  v
Select / Modify Seats
  |
  v
Checkout
  |
  v
Enter Customer Details
  |
  v
Complete Booking
  |
  v
passangers table
```

The shopping cart is maintained using a PHP session rather than being stored permanently in the database.

A booking is written to the database when the transaction is processed.

---

## Administration

The application provides a separate administration workflow.

The original implementation identifies the administrator using the username `rmiller`.

The administrator can:

* View routes
* Add routes
* Edit route prices
* Delete routes
* View the flight manifest
* Open individual flights
* View passengers and seat allocations
* View ticket revenue

The manifest functionality provides a view of flights that have passenger bookings associated with them.

---

## Seat Management

The application models a flight with **20 seats**.

Seat information is maintained by the `Cart` class and checked against existing passenger records in the database.

The booking system records the selected seat number in the `passangers` table.

Example historical booking data includes seats such as:

```text
7
8
9
10
11
12
```

The original application therefore included actual seat-allocation functionality rather than simply recording a number of tickets.

---

## Database

The application uses a MySQL database named:

```text
airline2013
```

The database dump is provided in:

```text
airline.sql
```

The main tables used by the application are:

### `user`

Stores registered customer information, including:

* Username
* Password
* Email
* Credit card number
* Passport number
* Account suspension status

### `routes`

Stores airline routes, including:

* Source
* Destination
* Operational start date
* Operational end date
* Ticket price

### `passangers`

Stores passenger booking information, including:

* Passenger name
* Passport
* Route
* Travel date
* Registered/guest status
* Registered username
* Credit card number
* Email
* Seat number

> **Note:** `passangers` is the original spelling used by the 2014 database schema and source code.

### `login`

Contains the original application login records.

---

## Project Files

The principal files include:

```text
controller.php
library.php
mysyles.css
insidestyles.css
airline.sql
```

### `controller.php`

The main application controller.

It receives commands through GET and POST requests and directs them to the appropriate view or processing function.

Examples include:

```text
login
register
search
addToCart
checkoutView
purchase
registerRequest
editroute
amendroute
deleteRoutes
addRoutes
addRoute
manifest
openflight
logout
```

### `library.php`

Contains the main application classes, including:

* `OutsideView`
* `InsideView`
* `loginView`
* `registerView`
* `SearchView`
* `ResultsView`
* `purchaseView`
* `CheckoutView`
* `adminView`
* `adminEditView`
* `adminAddRoute`
* `adminManifest`
* `Cart`
* `DBManager`

### `mysyles.css`

Provides the main external page styling.

The original filename is retained as supplied by the 2014 project.

### `insidestyles.css`

Provides styling for the internal/admin pages.

### `airline.sql`

Contains the original MySQL database schema and sample data.

---

## Technologies

The original project was developed using technologies typical of the 2014 coursework environment:

* **PHP 5.4**
* **MySQL 5.5**
* **PDO**
* **HTML**
* **CSS**
* **PHP Sessions**
* **HTTP Cookies**
* **phpMyAdmin**

The original database dump records the following environment information:

```text
PHP       5.4.19
MySQL     5.5.32
phpMyAdmin 4.0.4.1
```

The SQL dump was generated on:

```text
13 January 2014
```

---

## Design

The original interface uses a fixed-width layout of approximately 800 pixels.

The CSS uses traditional floating layouts:

```text
+----------------------------------------+
|                Header                  |
+----------------------------------------+
| Menu |             Content             |
|      |                                  |
|      |                                  |
+------+---------------------------------+
```

The project predates responsive web design frameworks and modern CSS layout systems such as Flexbox and Grid.

Some of the original CSS and class names also reflect code that was reused or adapted from earlier coursework. For example, the `bloggerlist` naming remains in parts of the source even though the application had evolved into an airline booking system.

---

## Historical Context

PHP Airlines was created in **2014** as part of the:

**Higher Diploma in Cloud and Mobile with Data Science**

The project represents the development practices and technology stack used during that period.

The source has been retained as a historical coursework project rather than rewritten into a modern PHP application.

Consequently, the repository is useful for documenting the original implementation and the progression of the project rather than representing current production-quality PHP development.

---

## Legacy Considerations

The original code contains a number of characteristics that would require attention before using the application in a modern production environment.

These include:

* Plain-text password handling
* Direct SQL construction
* Lack of prepared statements
* Storage of sensitive customer/payment information
* Reliance on cookies for login state
* Fixed-width page layouts
* Mixed PHP, HTML and database logic
* Legacy PHP/MySQL APIs and conventions
* Some incomplete or experimental functions
* Historical code and naming inherited from earlier coursework

These characteristics are retained here because the purpose of this repository is to preserve and understand the original 2014 implementation.

---

## Original Application Model

At a high level, the application can be represented as:

```text
                   PHP Airlines
                        |
          +-------------+-------------+
          |                           |
       Customer                    Admin
          |                           |
     Flight Search              Route Management
          |                           |
     Flight Results             Route Editing
          |                           |
       Seat Selection           Route Deletion
          |                           |
         Cart                    Add Routes
          |                           |
       Checkout                  Manifest
          |                           |
       Purchase                Flight Details
          |                           |
          +-------------+-------------+
                        |
                        v
                   DBManager
                        |
                        v
                  airline2013
                        |
          +-------------+-------------+
          |             |             |
        user         routes      passangers
```

---

## Project Status

**Historical / Educational Project — 2014**

The project is being preserved and documented from its original source code and database.

The intention is to understand and retain the original application rather than to present it as a modern production-ready airline booking platform.

---

## Author / Coursework

Developed as coursework in **2014** for the:

**Higher Diploma in Cloud and Mobile with Data Science**

Project: **PHP Airlines — Airline Booking and Passenger Management System**
