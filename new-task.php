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
    <h1>Create New Task</h1>
    <div id="form">
        <form action="create-task.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="" required><br>
            <label for="description">Descriprion:</label><br>
            <textarea type="textarea" id="description" name="description" rows="6" required></textarea><br>
            <input type="radio" id="completed" name="status" value="completed" required>
            <label for="status">Completed</label><br>
            <input type="radio" id="incompleted" name="status" value="incompleted">
            <label for="status">Incompleted</label><br>
            <input type="submit" id="btn" value="Submit">
        </form>
    </div>
</body>

</html>