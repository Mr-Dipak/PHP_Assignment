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

// SQL query to delete records with salary less than 20000
$sql = "DELETE FROM employees WHERE salary < 20000";

// Execute the query and get the number of affected rows
if ($conn->query($sql) === TRUE) {
    echo "Number of deleted records: " . $conn->affected_rows;
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>