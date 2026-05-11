<?php
include 'db.php';

// READ: Get all tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Demo 3</title>
</head>

<body>
    <div class="container">
        <h1>PHP Demo 3</h1>
        <p>Task Checklist II: Using HTML, CSS, JavaScript, PHP w/ MySQLi for CRUD</p>

        <form action="task_form.php" method="post">
            <div class="form-row">
                <label for="input2">Enter a Task:</label>
                <input type="text" id="input2" name="task" required>
            </div>
            <button type="submit" class="btn-action">Add Task</button>
        </form>
        <ul class="demo-checklist">
            <?php
            // READ (cont.): Display all tasks
            if ($result && $result->num_rows > 0) {
                foreach ($result as $row) {
                    echo
                        "<li class='demo-task-item'>" .
                        "   <input type='checkbox' data-task-id=" . $row['id'] . "> " .
                        "   <p id='task" . $row['id'] . "'>" . $row['task'] . "</p>" .
                        "   <form action='task_form.php' method='post' style='display:inline;'>" .
                        "   <input type='hidden' name='updated_task' id='updated_task" . $row['id'] . "'>" .
                        "       <button class='btn-action btn-item-update' value='" . $row['id'] . "'>Update</button>" .
                        "   </form>" .
                        "   <form action='task_form.php' method='post' style='display:inline;'>" .
                        "       <input type='hidden' name='delete_task' value='" . $row['id'] . "'>" .
                        "       <button type='submit' class='btn-danger'>Delete</button>" .
                        "   </form>" .
                        "</li>";
                }
            } else {
                echo "<li class='demo-task-item'>No Tasks Added</li>";
            }
            ?>
        </ul>
        <form action="task_form.php" method="post">
            <button type="submit" class="btn-danger" name="clear_all" value="1">Clear All Tasks</button>
        </form>

        <button class="guide-toggle">Toggle Guide</button>
        <div class="guide-container collapsed">
            <div class="guide-section">
                <h2>Step 1: Setup MySQL Database</h2>
                <ul>
                    <li>Open <a href="http://localhost/phpmyadmin" target="_blank">phpMyAdmin</a></li>
                    <li>Run this SQL script to create a database and a table</li>
                </ul>
                <pre>
                CREATE DATABASE IF NOT EXISTS php_demo3;
                USE php_demo3;
                CREATE TABLE IF NOT EXISTS tasks (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    task VARCHAR(255) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                );
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 2: Create Database Connection</h2>
                <ul>
                    <li>Create a new PHP file named 'db.php'</li>
                    <li>Add the following code to establish a connection to the database</li>
                </ul>
                <pre>
                &lt;?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "php_demo3";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                ?>
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 3: Frontend</h2>
                <ul>
                    <li>In your index.php, add the following code for frontend purpose</li>
                </ul>
                <pre>
                    &lt;form method="post" action="task_form.php"&gt;
                        &lt;input type="text" name="task" placeholder="Task" required&gt;
                        &lt;button type="submit"&gt;Add Task&lt;/button&gt;
                    &lt;/form&gt;
                    &lt;ul class="demo-checklist"&gt;
                        // Displaying tasks using php
                        // Update using a form and button with javascript
                        // Delete using a form and button with javascript
                    &lt;/ul&gt;
                    &lt;form method="post" action="task_form.php"&gt;
                        &lt;button type="submit" class="btn-danger" name="clear_all" value="1"&gt;Clear All Tasks&lt;/button&gt;
                    &lt;/form&gt;
                </pre>
            </div>
            <div class="guide-section">
                <h2>Step 3.1: CSS Styling</h2>
                <ul>
                    <li>Add the following code in your index.php for CSS styling</li>
                </ul>
                <pre>
                &lt;link rel="stylesheet" href="css/style.css"&gt;
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 4: CREATE (Add Task Form)</h2>
                <ul>
                    <li>Create a new PHP file named 'task_form.php'</li>
                    <li>Add the following code to create a form to add tasks to the database</li>
                </ul>
                <pre>
                &lt;?php
                include 'db.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $task = $_POST['task'];
                    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "&lt;br&gt;" . $conn->error;
                    }
                }
                ?>
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 5: READ (Display Tasks)</h2>
                <ul>
                    <li>Add the following code above index.php to fetch the tasks from the database</li>
                </ul>
                <pre>
                &lt;?php
                include 'db.php';

                $sql = "SELECT * FROM tasks";
                $result = $conn->query($sql);
                ?>
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 5.1: Display all tasks</h2>
                <ul>
                    <li>Add the following code to display all tasks and relevant action buttons on the webpage.</li>
                </ul>
                <pre>
                &lt;?php
                if ($result && $result->num_rows > 0) {
                    foreach ($result as $row) {
                        echo
                            "&lt;li class='demo-task-item'&gt;" .
                            "   &lt;input type='checkbox'&gt; " .
                            "   &lt;p id='task" . $row['id'] . "'&gt;" . $row['task'] . "&lt;/p&gt;" .
                            "   &lt;form action='task_form.php' method='post' style='display:inline;'&gt;" .
                            "   &lt;input type='hidden' name='updated_task' id='updated_task" . $row['id'] . "'&gt;" .
                            "       &lt;button class='btn-action btn-item-update' value='" . $row['id'] . "'&gt;Update&lt;/button&gt;" .
                            "   &lt;/form&gt;" .
                            "   &lt;form action='task_form.php' method='post' style='display:inline;'&gt;" .
                            "       &lt;input type='hidden' name='delete_task' value='" . $row['id'] . "'&gt;" .
                            "       &lt;button type='submit' class='btn-danger'&gt;Delete&lt;/button&gt;" .
                            "   &lt;/form&gt;" .
                            "&lt;/li&gt;";
                    }
                } else {
                    echo "&lt;li class='demo-task-item'&gt;No Tasks Added&lt;/li&gt;";
                }
                ?&gt;
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 6: UPDATE Tasks</h2>
                <ul>
                    <li>Add the following code in task_form.php to update (rename) a task.</li>
                </ul>
                <pre>
                &lt;?php
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
                ?&gt;
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 7: DELETE individual tasks</h2>
                <ul>
                    <li>Add the following code in task_form.php to delete a task from the database</li>
                </ul>
                <pre>
                &lt;?php
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
                ?&gt;
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 7.1: DELETE all tasks</h2>
                <ul>
                    <li>Add the following code in task_form.php to delete all tasks from the database</li>
                </ul>
                <pre>
                &lt;?php
                if (!empty($_POST['clear_all'])) {
                    try {
                        $sql = "DELETE FROM tasks";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                    } catch (Exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                ?&gt;
                </pre>
            </div>

            <div class="guide-section">
                <h2>Step 8: Redirect to index.php</h2>
                <ul>
                    <li>Add the following code to task_form.php to add the redirect back to index.php</li>
                </ul>
                <pre>
                &lt;?php
                header("Location: index.php");
                exit();
                ?&gt;
                </pre>
            </div>
        </div>
    </div>
    <script src="./js/guideScript.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>