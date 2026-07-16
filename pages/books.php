<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
</head>
<body>

<table>

<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Author</th>
    <th>ISBN</th>
    <th>Quantity</th>
    <th>Avalible quantity</th>
</tr>
<?php
    require_once "../config/config.php";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $query = "SELECT * FROM books;";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><th>" .$row['id']. "</th><th>" .$row['title']. "</th><th>" .$row['author']. "</th><th>" .$row['isbn']. "</th><th>" .$row['quantity']. "</th><th>" .$row['available_quantity']. "</th></tr>";
    }

    ?>

    </table>
</body>
</html>