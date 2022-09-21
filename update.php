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

// $image = $_REQUEST['image2'];
// $model = $_REQUEST['model2'];
// $price = $_REQUEST['price2'];
// $color = $_REQUEST['color2'];


$image = mysqli_real_escape_string($conn, $_POST['image2']);
$model = mysqli_real_escape_string($conn, $_POST['model2']);
$price = mysqli_real_escape_string($conn, $_POST['price2']);
$color = mysqli_real_escape_string($conn, $_POST['color2']);

$sql = "UPDATE carsinfo SET image = '$image', model = '$model', price = '$price', color = '$color' WHERE carid=$carid";
// $sql = "UPDATE carsinfo SET model = $model WHERE carid=$carid";
// $sql = "UPDATE carsinfo SET image = $image WHERE carid=$carid";
// $sql = "UPDATE carsinfo SET price = $price WHERE carid=$carid";
// $sql = "UPDATE carsinfo SET color = $color WHERE carid=$carid";




if ($conn->query($sql) === TRUE) {
    echo "record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
header("Location: index.php");
exit();
