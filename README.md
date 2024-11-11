Overview
This project is a PHP-based web application that includes multiple pages such as home, about, contact, and login, with styling (CSS), JavaScript functionality, and images. This README will guide you through setting up the project on a WAMP server and accessing it via localhost.

Prerequisites
WAMP Server - Download and install WAMP from WAMP Server's official website.
Basic PHP and MySQL knowledge (optional, but helpful).
Installation Instructions
Step 1: Set Up WAMP Server
Download and install WAMP Server.
Once installed, launch WAMP. Ensure the server icon is green, which means it's active.
Step 2: Place Project Files
Unzip the project folder (EGL208_Week5GroupProject-main.zip).
Copy the entire project folder to the www directory of your WAMP installation, typically located at:
makefile
Copy code
C:\wamp64\www\
Rename the project folder to something simple, such as makando.
Step 3: Configure the Database (if applicable)
If this project includes a MySQL database:

Open phpMyAdmin by clicking on the WAMP icon in the system tray and selecting phpMyAdmin.
Log in (default username is root, and there is no password by default).
Create a new database named makando (or any specified database name in the project code).
Import the .sql file (if provided) by selecting the makando database, then clicking Import, and uploading the SQL file.
Step 4: Configure Project Files
If necessary, update the database connection details in the project code:

Open the project folder in a text editor.
Locate the database configuration file (usually named config.php or within db_connect.php).
Ensure the database connection variables are correctly set:
php
Copy code
$servername = "localhost";
$username = "root";
$password = ""; // Leave blank if no password
$dbname = "makando"; // Name of the database you created
Step 5: Access the Project on localhost
Open a web browser.
Enter the following URL to access the project:
arduino
Copy code
http://localhost/makando
This should load the main page of the application.
Additional Information
Starting and Stopping WAMP: Use the WAMP icon in your system tray to start, stop, or restart the server.
Troubleshooting: If the WAMP icon is orange or red, ensure no other programs (like Skype) are using port 80.
Folder Structure
index.php: Main page
about.php: About page
contact.php: Contact page
login.php: Login page
css/: CSS styling files
js/: JavaScript files for added functionality
images/: Contains images used throughout the website
