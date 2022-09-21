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



$image = mysqli_real_escape_string($conn, $_POST['image']);
$model = mysqli_real_escape_string($conn, $_POST['model']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$color = mysqli_real_escape_string($conn, $_POST['color']);

$sql = "INSERT INTO carsinfo (image, model, price, color)
VALUES ('$image', '$model', '$price', '$color' )";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
exit();
