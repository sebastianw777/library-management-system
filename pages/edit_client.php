<?php
require_once "../auth.php";
require_once "../config/config.php";

$id = $_GET['id'];
$query = "SELECT * FROM clients WHERE id='$id';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<form method="post" action="">
    <label for="firstname">First name</label>
    <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>"><br>
    <label for="lastname">Last name</label>
    <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>"><br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php echo $row['email'];?>"><br>
    <label for="phone">Phone</label>
    <input type="number" name="phone" id="phone" value="<?php echo $row['phone'];?>"><br>
    <input type="submit" name="submit" value="Update">
</form> 

<?php
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query_update = "UPDATE clients SET first_name='$firstname', last_name='$lastname', email='$email', phone='$phone' WHERE id='$id'";
    $result_update = mysqli_query($conn, $query_update);
    header("Location: clients.php");
    exit();
}

