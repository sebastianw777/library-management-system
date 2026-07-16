<?php

session_start();
require_once "config/config.php";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM employees WHERE login = '$login';";
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['pass'])) {
        $_SESSION['login'] = $user['login'];

        header("Location: pages/books.php");
        exit();
    } else {
        header("Location: login.php?error=loginerror");
        exit();
    }
}