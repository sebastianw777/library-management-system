<?php

require "config/config.php";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$result = mysqli_query($conn, "SELECT COUNT(*) AS number FROM employees WHERE role = 'admin';"); // Check if the administrator account exist
$row = mysqli_fetch_assoc($result);

if ($row['number'] > 0) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $query = "INSERT INTO employees (first_name, last_name, login, pass, role) VALUES ('$first_name', '$last_name', '$login', '$password', 'admin');"; // Add first admin to database
    mysqli_query($conn, $query);

    header("Location: login.php");
}

?>

<form method="POST"> 
    <label for="first_name">First name</label> 
    <input type="text" name="first_name" id="first_name"><br>

    <label for="last_name">Last name</label>
    <input type="text" name="last_name" id="last_name"><br>

    <label for="login">Login</label>
    <input type="text" name="login" id="login"><br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password"><br>

    <input type="submit" name="submit" value="Create admin account">
</form>