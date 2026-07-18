<?php
require_once "../auth.php";
require_once "../config/config.php";

$id = $_GET['id'];
$query = "SELECT * FROM books WHERE id='$id';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<form method="post" action="">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo $row['title'];?>"><br>
    <label for="author">Author</label>
    <input type="text" name="author" id="author" value="<?php echo $row['author'];?>"><br>
    <label for="isbn">ISBN</label>
    <input type="text" name="isbn" id="isbn" value="<?php echo $row['isbn'];?>"><br>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" value="<?php echo $row['quantity'];?>"><br>
    <label for="available_quantity">Available Quantity</label>
    <input type="number" name="available_quantity" id="available_quantity" value="<?php echo $row['available_quantity'];?>"><br>
    <input type="submit" name="submit" value="Update">
</form>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
    $available_quantity = $_POST['available_quantity'];
    $query_update = "UPDATE books SET title='$title', author='$author', isbn='$isbn', quantity='$quantity', available_quantity='$available_quantity' WHERE id='$id'";
    $result_update = mysqli_query($conn, $query_update);
    header("Location: books.php");
    exit();
}

