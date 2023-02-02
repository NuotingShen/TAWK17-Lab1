<?php
// Create connection
$connection = mysqli_connect("localhost", "root", "root", "todo_application");

// check mysql connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// prepare and bind 
$stmt = $connection->prepare("SELECT * FROM tasks WHERE id=?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();

$result = $stmt->get_result(); // a function that used to get a result set from a prepared statement, as a mysqli_result object 
$task = $result->fetch_assoc(); //fetches a result as an array.


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Edit Task <?= $_GET["id"] ?></h1>
    <div id="form">
        <form action="update-task.php?id=<?= $_GET["id"] ?>" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="<?= $task["title"] ?>"><br>
            <label for="description">Descriprion:</label><br>
            <textarea type="textarea" id="description" name="description" rows="6"><?= $task["description"] ?></textarea><br>
            <input type="radio" id="completed" name="status" value="completed" <?= $task["status"] == 1 ? "checked" : "" ?>>
            <label for="status">Completed</label><br>
            <input type="radio" id="incompleted" name="status" value="incompleted" <?= $task["status"] == 0 ? "checked" : "" ?>>
            <label for="status">Incompleted</label><br>
            <input type="submit" id="btn" value="Submit">
            <!-- <button type="submit" id="btn" formaction="delete-task.php?id=<?= $_GET["id"] ?>" method="post">DELETE</button> -->
        </form>

        <form action="delete-task.php" method="post">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <input type="submit" id="btn" value="Delete">
        </form>
    </div>
</body>

</html>