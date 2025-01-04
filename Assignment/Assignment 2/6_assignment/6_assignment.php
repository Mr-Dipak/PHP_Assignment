<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];

    $sql = "SELECT * FROM emp WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emp_name = $row['name'];
        $emp_image = $row['image'];
    } else {
        $error = "No employee found with ID: $emp_id";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
</head>
<body>
    <form method="post" action="">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($emp_name) && isset($emp_image)): ?>
        <h2>Employee Details</h2>
        <p>Name: <?php echo htmlspecialchars($emp_name); ?></p>
        <img src="impfile/<?php echo htmlspecialchars($emp_image); ?>" alt="Employee Image">
    <?php elseif (isset($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</body>
</html>