<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test3q3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch courses from the database
$sql = "SELECT course_id, course_name FROM courses";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Dropdown</title>
</head>
<body>
    <form>
        <label for="courses">Choose a course:</label>
        <select id="courses" name="courses">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["course_id"] . "'>" . $row["course_name"] . "</option>";
                }
            } else {
                echo "<option value=''>No courses available</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>

<?php
$conn->close();
?>