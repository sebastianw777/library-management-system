<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <?php
        require_once "config/config.php";

        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        $query = "SELECT COUNT(*) AS number FROM employees;";

        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);

        if ($row['number'] > 0) {
            header("Location: login.php"); // If the account exist 
            exit;
        }
        else {
            header("Location: create_admin_account.php"); // If the account does not exist
            exit;
        }

        mysqli_close($conn)
    ?>

</head>
<body>

</body>
</html>