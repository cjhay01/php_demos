<?php
session_start();

// Initialize tasks array in session if it doesn't exist
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

// DEMO 1 -- Handle saving the name
if (isset($_POST['name'])) {
    $_SESSION['saved_name'] = htmlspecialchars($_POST['name']);
}

// DEMO 1 -- Handle clearing the name
if (isset($_POST['clear1'])) {
    $_SESSION['saved_name'] = null;
}

// DEMO 2 -- Handle adding a new task
if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
    $_SESSION['tasks'][] = htmlspecialchars(trim($_POST['task']));
}

// DEMO 2 -- Handle deleting a single task
if (isset($_POST['delete_task'])) {
    $index = (int) $_POST['delete_task'];
    if (isset($_SESSION['tasks'][$index])) {
        array_splice($_SESSION['tasks'], $index, 1);
    }
}

// DEMO 2 -- Handle clearing all tasks
if (isset($_POST['clear2'])) {
    $_SESSION['tasks'] = [];
}

// DEMO 3 -- Input validation & calculation
if (isset($_POST['weight']) && isset($_POST['height'])) {

    if (trim($_POST['weight']) == 0 || trim($_POST['height']) == 0) {
        echo "Please enter a valid weight and height";
    } else {
        $weight = (float) trim($_POST['weight']);
        $height = (float) trim($_POST['height']) / 100;
        $bmi = $weight / ($height * $height);
        $_SESSION['bmi_result'] = "Your BMI is: " . $bmi . " (Weight: " . $weight . "kg, Height: " . $height . "m)";
    }
}

// DEMO 3 -- Clear output
if (isset($_POST['clear3'])) {
    unset($_SESSION['bmi_result']);
}

// PRG (Post/Redirect/Get) pattern: redirect back to index.php after processing
header('Location: /php_demo2/');
exit;
?>