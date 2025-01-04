<!DOCTYPE html>
<html>
<head>
    <title>PHP Assignment</title>
</head>
<body>
    <form method="post" action="">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" required><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" required><br><br>
        <button type="submit" name="operation" value="add">Add</button>
        <button type="submit" name="operation" value="sub">Subtract</button>
        <button type="submit" name="operation" value="mul">Multiply</button>
        <button type="submit" name="operation" value="div">Divide</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                $operationName = "Addition";
                break;
            case 'sub':
                $result = $num1 - $num2;
                $operationName = "Subtraction";
                break;
            case 'mul':
                $result = $num1 * $num2;
                $operationName = "Multiplication";
                break;
            case 'div':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    $operationName = "Division";
                } else {
                    $result = "undefined (division by zero)";
                    $operationName = "Division";
                }
                break;
            default:
                $result = "Invalid operation";
                $operationName = "Invalid";
                break;
        }

        echo "<h2>Result of $operationName:</h2>";
        echo "<p>$result</p>";
    }
    ?>
</body>
</html>