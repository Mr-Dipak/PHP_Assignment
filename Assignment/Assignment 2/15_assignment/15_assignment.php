<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to update student details
function updateStudent($id, $name, $age, $gender, $address, $course, $hobbies) {
    global $conn;
    $sql = "UPDATE students SET name=?, age=?, gender=?, address=?, course=?, hobbies=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssi", $name, $age, $gender, $address, $course, $hobbies, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $hobbies = $_POST['hobbies'];

    updateStudent($id, $name, $age, $gender, $address, $course, $hobbies);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student Details</title>
</head>
<body>
    <form method="post" action="">
        <label for="id">Student ID:</label>
        <input type="text" id="id" name="id" required><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required><br><br>
        <label for="hobbies">Hobbies:</label>
        <input type="text" id="hobbies" name="hobbies" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>