<form method="post" action="">
    <label for="title">Title</label>
    <input type="text" name="title" id="title"><br>
    <label for="author">Author</label>
    <input type="text" name="author" id="author"><br>
    <label for="isbn">ISBN</label>
    <input type="text" name="isbn" id="isbn"><br>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity"><br>
    <label for="available_quantity">Available Quantity</label>
    <input type="number" name="available_quantity" id="available_quantity"><br>
    <input type="submit" name="submit" value="Add">
</form>

<?php
require_once "../auth.php";
require_once "../config/config.php";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
    $available_quantity = $_POST['available_quantity'];

    $query_update = "INSERT INTO books (title, author, isbn, quantity, available_quantity) VALUES ('$title', '$author', '$isbn', '$quantity', '$available_quantity')";
    $result_update = mysqli_query($conn, $query_update);
    header("Location: books.php");
    exit();
}

