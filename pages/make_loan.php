<?php

require_once "../auth.php";
require_once "../config/config.php";

$id = $_GET['id'];

$query = "SELECT * FROM books WHERE id='$id';";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

echo "<a href='books.php'>Cancel</a><br>";
echo "Make Loan for Book: " .$row['title']. "<br>";
echo "Available quantity: " .$row['available_quantity']. "<br>";

?>

<h2>Select client to make loan:</h2>

<form method="POST" action="">
    <input type="text" name="search" placeholder="Search client...">
    <input type="submit" value="Search">
</form>

<table>
<tr>
    <th>ID</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>Phone</th>
</tr>

<?php
$search = isset($_POST['search']) ? $_POST['search'] : '';

$query2 = "SELECT * FROM clients WHERE CONCAT(first_name, ' ', last_name) LIKE '%$search%'";

$result2 = mysqli_query($conn, $query2);


while ($row2 = mysqli_fetch_assoc($result2)) {
    echo "<tr><td>" .$row2['id']. "</td><td>" .$row2['first_name']. "</td><td>" .$row2['last_name']. "</td><td>" .$row2['email']. "</td><td>" .$row2['phone']. "</td><td><a href='make_loan_script.php?book_id=".$id."&client_id=".$row2['id']."'>Select</a></td></tr>";
}

?>


