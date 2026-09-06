<form method="post" action="">
    <label for="firstname">First name</label>
    <input type="text" name="firstname" id="firstname"><br>
    <label for="lastname">Last name</label>
    <input type="text" name="lastname" id="lastname"><br>
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone"><br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email"><br>
    <input type="submit" name="submit" value="Add">
</form>

<?php
require_once "../auth.php";
require_once "../config/config.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $query_update = "INSERT INTO clients (first_name, last_name, phone, email) VALUES ('$first_name', '$last_name', '$phone', '$email')";
    $result_update = mysqli_query($conn, $query_update);
    header("Location: clients.php");
    exit();
}

