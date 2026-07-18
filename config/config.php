<?php

/*
You can change the database connection settings below if needed.

By default, the configuration is set for a standard local PHP/MySQL
environment:
- Host: localhost
- Database: database_name (default: library_management_system)
- Username: root
- Password: (empty)
*/

$db_host = "localhost"; // Host
$db_name = "library_management_system"; // Database name
$db_user = "root"; // Username
$db_pass = ""; // Password

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Dont change this line!
?>
