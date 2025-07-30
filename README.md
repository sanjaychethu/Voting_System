# Online Voting System

A simple, file-based online voting system built with PHP and MySQL. This project allows users to register as either a voter or a group (candidate), log in, and cast their vote. It's designed to be a straightforward example of a dynamic web application using a classic LAMP/XAMPP stack.

## Features

- **User Roles:** Separate roles for Voters and Groups (Candidates).
- **User Registration:** Users can register with their name, mobile number, address, and a profile photo.
- **User Login:** Secure login system for both voters and groups.
- **Password Hashing:** Passwords are securely hashed using `password_hash()` for database security.
- **Dashboard:**
    - Voters can view candidate profiles and cast their vote.
    - Groups can view their profile and see the current vote count.
- **Voting Mechanism:** Voters can cast their vote once. The system locks them out from voting again.
- **Session Management:** Uses PHP sessions to manage user login state.

## Tech Stack

- **Frontend:** HTML, CSS
- **Backend:** PHP
- **Database:** MySQL
- **Server:** Apache (via XAMPP)

## Project Setup and Installation

Follow these steps to get the project running on your local machine.

### Prerequisites

- **XAMPP:** You must have [XAMPP](https://www.apachefriends.org/index.html) installed, which includes Apache, MySQL, and PHP.

### 1. Clone or Download the Project

- Place all the project files inside a folder named `Voting_System` within your XAMPP `htdocs` directory.
- The final path should look like: `C:/xampp/htdocs/Voting_System/`

### 2. Create the Database

- Start the **Apache** and **MySQL** modules from the XAMPP Control Panel.
- Go to `http://localhost/phpmyadmin/` in your browser.
- Create a new database and name it `voting`.
- Select the `voting` database and go to the **SQL** tab.
- Copy the content from the `voting.sql` file provided with the project and run it to create the `user` table.

### 3. Configure the Database Connection

- This project is configured to connect to MySQL on **port 3307**. If your XAMPP MySQL runs on a different port (like the default 3306), you must update it.
- Open the file `api/connect.php`.
- Change the port number in the `mysqli_connect` function if necessary.

```php
// api/connect.php
$connect = mysqli_connect("localhost", "root", "", "voting", 3307);

4. Run the Application
Open your web browser and navigate to: http://localhost/Voting_System/

You should see the login page. You can now register new users or log in.

File Structure
/Voting_System
|
|-- /api
|   |-- connect.php       # Handles database connection
|   |-- login.php         # Handles login logic
|   |-- logout.php        # Handles logout logic
|   |-- register.php      # Handles registration logic
|   |-- vote.php          # Handles voting logic
|
|-- /css
|   |-- stylesheet.css    # Main stylesheet for the application
|
|-- /routes
|   |-- dashboard.php     # User dashboard for voting/viewing results
|   |-- register.html     # Registration form
|
|-- /uploads            # Directory where user profile images are stored
|
|-- index.html            # The main login page
|-- voting.sql            # The database schema file
|-- README.md             # This file

