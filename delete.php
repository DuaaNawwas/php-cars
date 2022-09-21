<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$carid = $_GET['carid'];
// sql to delete a record
$sql = "DELETE FROM carsinfo WHERE carid=$carid";

$conn->query($sql);

$conn->close();
header("Location: index.php");
exit();
