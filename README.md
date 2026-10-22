# Airline2014

Airline2014 is an original 2014 PHP airline booking application being restored and documented for local use. It provides customer booking and administrator route-management workflows backed by a MySQL database.

The goal of this repository is to preserve the original PHP architecture and interface, not to rewrite or redesign the application. The screenshots below document the application as it was implemented.

Originally developed as part of the **Higher Diploma in Cloud and Mobile with Data Science**, the project reflects the web development practices and conventions of its time.

## Technologies

The project uses the following technologies:

- PHP
- MySQL
- PDO for database access
- HTML forms and server-rendered views
- CSS (`mystyles.css` and `insidestyles.css`)
- PHP sessions and cookies for cart and login state

There is no standalone JavaScript source file in this repository; the application is primarily server-rendered PHP and HTML.

The supplied SQL dump was generated with PHP 5.4.19, MySQL 5.5.32, and phpMyAdmin 4.0.4.1 on 13 January 2014. Newer local PHP/MySQL versions may require compatibility changes that are outside the scope of this restoration.

## Features

### Customer booking

- Search routes by origin, destination, travel date, and number of tickets
- Display matching flight results
- Check availability across the application's 20-seat flight model
- Select seats and add a provisional flight to the session-backed cart
- Review, update, or remove cart items
- Register a customer account or continue as a guest
- Enter passenger, passport, email, and payment details
- Complete a booking and write passenger and seat records to the database
- Log in and log out

### Administration

- Log in to the administration area
- View active routes
- Add routes with operating dates and prices
- Edit route prices
- Delete routes
- View a flight manifest
- Open flight details, including passenger and seat information
- View the route and passenger data used to calculate flight revenue

## Screenshots

The screenshots are existing captures of the original application. They document the customer booking flow and administrative screens without changing the application itself.

### Customer workflow

| Screen | Description |
|---|---|
| ![Home screen](assets/Images/homescreen.jpg) | Guest home screen with route, ticket, and date search |
| ![Login](assets/Images/login.jpg) | Customer login form |
| ![Registration](assets/Images/register.jpg) | Customer registration form |
| ![Logged in](assets/Images/logged-in.jpg) | Search screen for a logged-in customer |
| ![Search](assets/Images/search.jpg) | Route search |
| ![Search results](assets/Images/search-results.jpg) | Available flight results |
| ![Availability](assets/Images/availability.jpg) | Seat availability |
| ![Booked seats](assets/Images/seats-booked.jpg) | Seat allocation after booking |
| ![Booked seats PNG](assets/Images/seats-booked.png) | Additional seat-allocation capture |
| ![Purchase complete](assets/Images/purchased.jpg) | Completed purchase screen |

### Administration workflow

| Screen | Description |
|---|---|
| ![Edit routes](assets/Images/admin-view-edit-routes.jpg) | Administrator route list and editing options |
| ![Add routes](assets/Images/admin-add-routes.jpg) | Add-route form |
| ![Add route](admi-add-route.jpg) | Additional add-route capture |
| ![Flight manifest](assets/Images/admi-view-mainfest.jpg) | Flight manifest and administration view |

## Running locally

The application is a traditional PHP application with `controller.php` as its entry point.

1. Install a local PHP runtime with the PDO MySQL extension and a MySQL server.
2. Create or import the `airline2013` database from [`airline2013.sql`](airline2013.sql).
3. Check the database host, port, username, password, and database name in `DBManager` in [`library.php`](library.php). Use local configuration appropriate for your machine rather than copying credentials from the historical source.
4. Serve the repository from a PHP-enabled web server.
5. Open `controller.php` in a browser.

For the current local development environment, the PHP development server can be started from PowerShell in the project directory:

```powershell
& "C:\php-8.4.26\php.exe" -S localhost:8000
```

The application can then be opened at:

http://localhost:8000/controller.php

The local MySQL instance uses host `127.0.0.1`, port `3307`, and database `airline2013`. The database username and password should remain specific to the local environment.

The SQL dump contains the original schema and sample data for the `login`, `user`, `routes`, and `passangers` tables. `passangers` is the historical spelling retained by the source and schema.

## Project structure

- [`controller.php`](controller.php) — central GET/POST command router and request handlers
- [`library.php`](library.php) — view classes, cart behavior, seat processing, and `DBManager`
- [`airline2013.sql`](airline2013.sql) — MySQL schema and sample data
- [`mystyles.css`](mystyles.css) — customer-facing styles
- [`insidestyles.css`](insidestyles.css) — internal and administration styles
- [`assets/Images/`](assets/Images/) — existing application screenshots

The original interface uses a fixed-width layout of approximately 800 pixels and traditional CSS floats rather than a modern responsive framework. The source also contains historical naming and implementation patterns from the 2014 project.

The central controller dispatches requests to the relevant application logic and views. Supporting classes handle page presentation, cart operations, seat processing, and database access. This original structure is retained as part of the restoration.

## Legacy status

This is a historical and educational application, not a production-ready booking system.

Before any real-world use, it would require a security and reliability review, including replacing plain-text credential handling, parameterising database queries, protecting sensitive customer and payment data, and updating legacy PHP/database conventions.

The immediate objective is to preserve the original application, document its functionality, and establish a working local reference. Any future modernisation should be treated as a deliberate subsequent stage rather than a replacement for the original project.