<?php
$connection = mysqli_connect("localhost", "root", "root", "todo_application");

// check mysql connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$id = $_POST["id"];


$query = "DELETE FROM tasks WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);

$success = $stmt->execute();

if ($success) {
    header("Location: http://localhost:8888/lab1/index.php");
} else {
    echo "Error deleting data: " . mysqli_error($connection);
}

$sql = "DELETE FROM tasks WHERE id=$id";

//close connection not necessary 
mysqli_close($connection);
?>