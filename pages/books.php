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
        <a href="loans.php">Loans</a>
        <a href="../logout.php">Logout</a>


        <?php
            require_once "../config/config.php";
            $login = $_SESSION['login'];
            $query_name = "SELECT * FROM employees WHERE login = '$login';";
            $result = mysqli_query($conn, $query_name);

            $user = mysqli_fetch_assoc($result);
            
            echo "<p>Account: " .$user['first_name']. " " .$user['last_name']. "</p>";
        ?>
        <a href="add_book.php">Add book</a>
    </nav>
</header>
<main>

    <form method="POST" action="">
        <input type="text" name="search" placeholder="Search book by title or ISBN...">
        <input type="submit" value="Search">
    </form>

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
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    $query = "SELECT * FROM books WHERE CONCAT(title, ' ', isbn) LIKE '%$search%';";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row['id']. "</td><td>" .$row['title']. "</td><td>" .$row['author']. "</td><td>" .$row['isbn']. "</td><td>" .$row['quantity']. "</td><td>" .$row['available_quantity']. "</td><td><a href='edit_book.php?id=".$row['id']."'>Edit</a></td><td><a href='make_loan.php?id=".$row['id']."'>Make Loan</a></td></tr>";
    }

    ?>

    </table>
</main>

</body>
</html>