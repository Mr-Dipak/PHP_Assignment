<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <form action="redirect.php" method="post">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" required><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" required><br><br>
        <button type="submit" name="operation" value="add">Add</button>
        <button type="submit" name="operation" value="sub">Subtract</button>
        <button type="submit" name="operation" value="mul">Multiply</button>
        <button type="submit" name="operation" value="div">Divide</button>
    </form>
</body>
</html>