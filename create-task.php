<?php
// Include code for connecting to the database, preparing and executing an INSERT statement, 
//and closing the connection.

// connect to the database 
$connection = mysqli_connect("localhost", "root", "root", "todo_application");

// check mysql connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Taking all 3 values from the form data(input)
$title =  $_POST['title'];
$description = $_POST['description'];
$status =  $_POST['status'];

if($status == "completed"){
    $status = 1;
}else{
    $status = 0;
}

// INSERT DATA
$query = "INSERT INTO tasks (title, description, status) VALUES (?,?,?)"; // set the query
$stmt = $connection->prepare($query); // prepare the query for the execution
$stmt->bind_param("ssi", $title, $description, $status); // add values to query
$success = $stmt->execute(); // execute query

//check
if ($success) {
    header("Location: http://localhost:8888/lab1/index.php");
} else {
    echo "ERROR: NO data sotred. " . mysqli_error($connection);
}

// Close connection, not necessary 
mysqli_close($connection);
?>
