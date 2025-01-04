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

// SQL to delete records
$sql = "DELETE FROM employees WHERE salary < 20000";

if ($conn->query($sql) === TRUE) {
    $deletedRecords = $conn->affected_rows;
    echo "Number of deleted records: " . $deletedRecords;
} else {
    echo "Error deleting records: " . $conn->error;
}

$conn->close();
?>