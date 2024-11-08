<?php
// Task storage file path
define('TASKS_FILE', 'tasks.txt');

/**
 * Get all tasks from the file
 * 
 * @return array List of tasks
 */
function getTasks() {
    if (!file_exists(TASKS_FILE)) {
        return [];
    }

    // Read tasks from the file and return as an array
    return file(TASKS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

/**
 * Add a new task to the file
 * 
 * @param string $task Task to be added
 */
function addTask($task) {
    file_put_contents(TASKS_FILE, $task . PHP_EOL, FILE_APPEND);
}

/**
 * Delete a task by index
 * 
 * @param int $index Index of the task to delete
 */
function deleteTask($index) {
    $tasks = getTasks();

    if (isset($tasks[$index])) {
        unset($tasks[$index]);
        file_put_contents(TASKS_FILE, implode(PHP_EOL, $tasks) . PHP_EOL);
    }
}
?>
