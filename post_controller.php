<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Best Price Main</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="wrapper">
<?php

// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include "DatabaseAdapter.php";
$theDBA = new DatabaseAdaptor();

$brand = $_GET["brand"];
$model = $_GET["model"];
$price = $_GET["price"];
$conditions = $_GET["conditions"];
$buyer_id = htmlspecialchars($_SESSION["user_id"]);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_final";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO items (brand,model,price,conditions,buyer_id) VALUES ('$brand', '$model', '$price','$conditions','$buyer_id');";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Your Post created successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
</div>

<div class="welcome">
<a href="index.php">Return</a>
</div>

</body>
</html>
