<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Demo 2</title>
</head>

<body>
    <div class="container">
        <h1>PHP Demo 2</h1>
        <p>Forms with PHP</p>
        <ol class="list">
            <li class="item">
                <div class="item-container">
                    <p>Simple Name Form</p>
                    <form action="form.php" method="post">
                        <div class="form-row">
                            <label for="input1">Enter your name:</label>
                            <input type="text" id="input1" name="name" required>
                        </div>
                        <button type="submit" class="btn-action">Submit</button>
                    </form>
                    <code>
                        <?php
                        if (!empty($_SESSION['saved_name'])) {
                            echo "Hello, now I know your name! It's " . $_SESSION['saved_name'] . "!";
                        } else {
                            echo "Who are you?";
                        }
                        ?>
                    </code>

                    <form action="form.php" method="post">
                        <button type="submit" class="btn-danger" name="clear1" value="1">Forget my name (Clear)</button>
                    </form>
                </div>
            </li>
            <li>
                <div class="item-container">
                    <p>Task Checklist (Adding/Deleting a task)</p>
                    <form action="form.php" method="post">
                        <div class="form-row">
                            <label for="input2">Enter a Task:</label>
                            <input type="text" id="input2" name="task" required>
                        </div>
                        <button type="submit" class="btn-action">Submit</button>
                    </form>
                    <ul class="demo-checklist">
                        <?php
                        if (!empty($_SESSION['tasks'])) {
                            foreach ($_SESSION['tasks'] as $index => $task) {
                                echo "<li class='demo-task-item'>";
                                echo "<input type='checkbox' checked> " . $task;
                                echo "<form action='form.php' method='post' style='display:inline;'>";
                                echo "<input type='hidden' name='delete_task' value='" . $index . "'>";
                                echo "<button type='submit' class='btn-danger'>Delete</button>";
                                echo "</form>";
                                echo "</li>";
                            }
                        } else {
                            echo "<li class='demo-task-item'>No Tasks Added</li>";
                        }
                        ?>
                    </ul>
                    <form action="form.php" method="post">
                        <button type="submit" class="btn-danger" name="clear2" value="1">Clear All Tasks</button>
                    </form>
                </div>
            </li>
            <li>
                <div class="item-container">
                    <p>BMI Calculator</p>
                    <form action="form.php" method="post">
                        <div class="form-row">
                            <label for="input3">Enter your weight (kg):</label>
                            <input type="text" id="input3" name="weight" required>
                        </div>
                        <div class="form-row">
                            <label for="input4">Enter your height (cm):</label>
                            <input type="text" id="input4" name="height" required>
                        </div>
                        <button type="submit" class="btn-action">Submit</button>
                    </form>
                    <code>
                        <?php
                        if (!empty($_SESSION['bmi_result'])) {
                            echo $_SESSION['bmi_result'];
                        } else {
                            echo "Enter your weight and height to calculate BMI";
                        }
                        ?>
                    </code>

                    <form action="form.php" method="post">
                        <button type="submit" class="btn-danger" name="clear3" value="1">Clear output</button>
                    </form>
                </div>
            </li>
        </ol>
    </div>
</body>

</html>