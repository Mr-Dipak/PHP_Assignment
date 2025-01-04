<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];

    // Fetch employee record
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display employee record
        $row = $result->fetch_assoc();
        echo "Employee ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Position: " . $row["position"] . "<br>";
        echo "Salary: " . $row["salary"] . "<br>";

        // Delete employee record
        $sql = "DELETE FROM employees WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $emp_id);
        $stmt->execute();

        echo "<br>Record deleted successfully.";
    } else {
        echo "No record found for Employee ID: " . $emp_id;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Employee Record</title>
</head>
<body>
    <form method="post" action="">
        <label for="emp_id">Employee ID:</label>
        <input type="text" id="emp_id" name="emp_id" required>
        <button type="submit">Delete Employee</button>
    </form>
</body>
</html>