<?php
    $servername = "localhost";
    $usrName = "root";
    $pass = "";
    $dbName = "employeeq2";

    $conn = new mysqli($servername, $usrName, $pass, $dbName);

    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    // Data Fetch
    $sql = "SELECT * FROM employees WHERE age < 24";
    $result = $conn->query($sql);

    $even = [];
    $odd = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['age'] % 2 == 0) {
                $even[] = $row;
            } else {
                $odd[] = $row;
            }
        }
    }

    echo "<h1>Even</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
            </tr>";
    foreach ($even as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['position']}</td>
              </tr>";
    }
    echo "</table>";

    echo "<h1>Odd</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
            </tr>";
    foreach ($odd as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['position']}</td>
              </tr>";
    }
    echo "</table>";

    $conn->close();
?>