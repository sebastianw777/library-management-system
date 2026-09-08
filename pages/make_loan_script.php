<?php

$book_id = $_GET['book_id'];
$client_id = $_GET['client_id'];

require_once "../auth.php";
require_once "../config/config.php";

$query = "SELECT * FROM books WHERE id='$book_id';";
$query2 = "SELECT * FROM clients WHERE id='$client_id';";
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);

echo "Book: " .$row['title']. "<br>";
echo "Client: " .$row2['first_name']. " " .$row2['last_name']. "" .$row2['email'].  "" .$row2['phone']. "<br>";

?>

<form method="POST" action="">
    <label for="return_date">Return date</label>
    <input type="date" name="return_date" id="return_date" required><br>
    <input type="submit" name="confirm" value="Confirm">
</form>

<?php
    if (isset($_POST['confirm'])) {
        $return_date = $_POST['return_date'];

        $query3 = "INSERT INTO loans (book_id, client_id, return_date) VALUES ('$book_id', '$client_id', '$return_date');";
        $result3 = mysqli_query($conn, $query3);
        echo "Loan created successfully.";
        $query4 = "UPDATE books SET available_quantity = available_quantity - 1 WHERE id='$book_id';";
        $result4 = mysqli_query($conn, $query4);
    }
?>