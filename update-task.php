<?php
// Include code for connecting to the database, preparing and executing an INSERT statement, 
//and closing the connection.

// connect to the database 
$connection = mysqli_connect("localhost", "root", "root", "todo_application");

// check mysql connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// get data from post request
$title = $_POST["title"];
$description = $_POST["description"];
$status = $_POST["status"];
if ($status == "completed") {
    $status = 1;
} else {
    $status = 0;
}
$id = $_GET["id"];

// bind and prepare
$stmt = $connection->prepare("UPDATE tasks SET title=?, description=?, status=? WHERE id=?");
$stmt->bind_param("ssii", $title, $description, $status, $id);
$success = $stmt->execute();

if($success){
    header("Location: http://localhost:8888/lab1/index.php");
}else{
    echo "ERROR: NO data sotred. ";
}

// Close connection
mysqli_close($connection);
