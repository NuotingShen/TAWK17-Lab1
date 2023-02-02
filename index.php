<?php
// here to write php code
$page_title = "TODO Application";
//create connection
$mysqli = new mysqli("localhost", "root", "root", "todo_application");
// check mysql connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
//select from the table (todo_application is a database name, not a table name)
$sql = "SELECT * FROM tasks"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1><?= $page_title ?></h1>
    <div id="main">
        <h3><a href="new-task.php"><u>+ Create New Tasks</u></a></h3>
        <table>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Descriprion</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
            <?php
            if ($result = $mysqli->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        if ($row['status'] == 1) {
                            echo "<td>" . "Completed" . "</td>";
                        } else {
                            echo "<td>" . "Incompleted" . "</td>";
                        }
                        echo "<td>" . "<button><a href='edit-task.php?id={$row["id"]}'>EDIT/DELETE</a></button>";
                        echo "</tr>";
                    }
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
            }
            ?>
        </table>
    </div>
</body>

</html>