<?php

require_once "../auth.php";
require_once "../config/config.php";

$id = $_GET['loan_id'];
$book_id = $_GET['book_id'];

$query1 = "UPDATE books SET available_quantity = available_quantity + 1 WHERE id='$book_id';";
$result1 = mysqli_query($conn, $query1);

$query2 = "DELETE FROM loans WHERE id='$id';";
$result2 = mysqli_query($conn, $query2);


header("Location: loans.php");

?>