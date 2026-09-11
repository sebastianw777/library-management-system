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
    </nav>
</header>
<main>
<table>

<tr>
    <th>ID</th>
    <th>Book ID</th>
    <th>Client ID</th>
    <th>Loan Date</th>
    <th>Return Date</th>
    <th>Employee ID</th>
</tr>
<?php
    $query = "SELECT * FROM loans;";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row['id']. "</td><td>" .$row['book_id']. "</td><td>" .$row['client_id']. "</td><td>" .$row['loan_date']. "</td><td>" .$row['return_date']. "</td><td>" .$row['employee_id']. "</td><td><a href='return.php?loan_id=" .$row['id']."&book_id=" .$row['book_id']."'>Return</a></td></tr>";
    }

    ?>

    </table>
</main>

</body>
</html>