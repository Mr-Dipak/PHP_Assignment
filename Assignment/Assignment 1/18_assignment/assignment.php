<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS student (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age INT(3) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(100) NOT NULL,
    course VARCHAR(50) NOT NULL,
    hobbies VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table student created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $hobbies = $_POST['hobbies'];

    // Insert data into table
    $stmt = $conn->prepare("INSERT INTO student (name, age, gender, address, course, hobbies) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $name, $age, $gender, $address, $course, $hobbies);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br>
        Age: <input type="number" name="age" required><br>
        Gender: <input type="text" name="gender" required><br>
        Address: <input type="text" name="address" required><br>
        Course: <input type="text" name="course" required><br>
        Hobbies: <input type="text" name="hobbies" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>