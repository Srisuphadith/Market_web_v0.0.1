<?php
session_start();
require_once "connect.php";
$id = $_SESSION["user_id"];
$sql = "SELECT * FROM user_login Where user_id ='$id' ";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Admin Pages</h1>
    <p>Dashboard</p>
    <h1><?php echo $row["username"]; ?></h1>
    <h1><a href="session.php">log out</a></h1>
</body>
</html>