<?php
include 'db.php';

// CREATE: Add task
if (!empty($_POST['task'])) {
    try {
        $task = $_POST['task'];
        $sql = "INSERT INTO tasks (task) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $task);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// READ is in index.php

// UPDATE: Renaming a task
if (!empty($_POST['task_id'])) {
    try {
        $taskID = $_POST['task_id'];
        $task = $_POST['updated_task'];
        $sql = "UPDATE tasks SET task = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $task, $taskID);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// DELETE: removing a task
if (!empty($_POST['delete_task'])) {
    try {
        $taskID = $_POST['delete_task'];
        $sql = "DELETE FROM tasks WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $taskID);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// DELETE: all tasks
if (!empty($_POST['clear_all'])) {
    try {
        $sql = "DELETE FROM tasks";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// redirect back to index.php
/* header("Location: index.php");
exit(); */
?>