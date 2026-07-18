<?php
require_once "../auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
</head>
<body>

<header>
<h1>Library Management System</h1>
    <nav>
        <a href="books.php">Books database</a>
        <a href="clients.php">Clients database</a>
        <a href="../logout.php">Logout</a>
        <?php
            require_once "../config/config.php";
            $login = $_SESSION['login'];
            $query_name = "SELECT * FROM employees WHERE login = '$login';";
            $result = mysqli_query($conn, $query_name);

            $user = mysqli_fetch_assoc($result);
            
            echo "<p>Account: " .$user['first_name']. " " .$user['last_name']. "</p>";
        ?>
    </nav>
</header>
<main>
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
    $query = "SELECT * FROM books;";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><th>" .$row['id']. "</th><th>" .$row['title']. "</th><th>" .$row['author']. "</th><th>" .$row['isbn']. "</th><th>" .$row['quantity']. "</th><th>" .$row['available_quantity']. "</th><th><a href='edit_book.php?id=".$row['id']."'>Edit</a></th></tr>";
    }

    ?>

    </table>
</main>

</body>
</html>