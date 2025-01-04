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
$id = 1; // ID of the student to update
$name = "John Doe";
$age = 20;
$gender = "Male";
$address = "123 Main St";
$course = "Computer Science";
$hobbies = "Reading, Coding";

updateStudent($id, $name, $age, $gender, $address, $course, $hobbies);

$conn->close();
?>