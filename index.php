<?php
// Include functions file
require_once 'functions.php';

// Check if the form has been submitted to add a task
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task'])) {
    addTask($_POST['task']);
}

// Check if a delete request has been made
if (isset($_GET['delete'])) {
    deleteTask($_GET['delete']);
}

// Fetch all tasks
$tasks = getTasks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Task Manager</h1>

    <!-- Form to add a new task -->
    <form method="POST" action="">
        <input type="text" name="task" placeholder="Enter a new task">
        <button type="submit">Add Task</button>
    </form>

    <!-- Display tasks list -->
    <ul>
        <?php foreach ($tasks as $index => $task): ?>
            <li>
                <?php echo htmlspecialchars($task); ?>
                <a href="?delete=<?php echo $index; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
