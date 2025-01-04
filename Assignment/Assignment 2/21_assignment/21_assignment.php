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

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_id = $_POST['emp_id'];

        // Database connection
        $conn = new mysqli("localhost", "root", "", "your_database_name");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch employee details
        $sql = "SELECT * FROM emp WHERE emp_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $emp_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>Employee Details</h2>";
                echo "ID: " . $row["emp_id"] . "<br>";
                echo "Name: " . $row["name"] . "<br>";
                echo "Position: " . $row["position"] . "<br>";
                echo "Department: " . $row["department"] . "<br>";
                echo "<img src='impfile/" . $row["image"] . "' alt='Employee Image' style='width:200px;height:200px;'><br>";
            }
        } else {
            echo "No employee found with ID: " . $emp_id;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>