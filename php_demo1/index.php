<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Demo 1</title>
</head>

<body>
    <div class="container">
        <h1>PHP Demo 1</h1>
        <p>This is a simple PHP demo with the echo function</p>
        <ol>
            <li>
                <p>Printing "Hello World" using PHP</p>
                <div class="code-block">
                    <code>
                        <?php
                        echo "<button>Hello World</button>";
                        ?>
                    </code>
                </div>
            </li>
            <li>
                <p>Dynamic data with variables</p>
                <div class="code-block">
                    <?php $name = "Ian"; ?>
                    <code>
                        <?php
                        echo "Hello, $name!";
                        ?>
                    </code>
                </div>
            </li>
            <li>
                <p>Shorthand variable name (see code)</p>
                <div class="code-block">
                    <?php $name = "gwapo" ?>
                    <code>
                        Welcome <?= $name ?> to the language of PHP
                    </code>
                </div>
            </li>
            <li>
                <?php $num1 = 30;
                $num2 = 20;
                $sum = $num1 + $num2 ?>
                <p>Display the sum of two numbers (<?= $num1 ?> and <?= $num2 ?>)</p>
                <div class="code-block">
                    <code>
                        <?php
                        echo "Sum of $num1 and $num2: $sum";
                        ?>
                    </code>
                </div>
            </li>
            <li>
                <?php $prod = $num1 * $num2 ?>
                <p>Display the product of two numbers (<?= $num1 ?> and <?= $num2 ?>)
                </p>
                <div class="code-block">
                    <code>
                        <?php
                        echo "Product of $num1 and $num2: $prod";
                        ?>
                    </code>
                </div>
            </li>
        </ol>
    </div>
</body>

</html>