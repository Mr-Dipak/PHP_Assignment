<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment28";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmpName = $file['tmp_name'];
        $fileType = $file['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $allowed = array('pdf');

        if (in_array($fileExt, $allowed) && $fileSize <= 102400) {
            $uploadDir = 'impfile/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $filePath = $uploadDir . basename($fileName);

            if (move_uploaded_file($fileTmpName, $filePath)) {
                $stmt = $conn->prepare("INSERT INTO uploads (filename) VALUES (?)");
                $stmt->bind_param("s", $fileName);
                $stmt->execute();
                echo "File uploaded successfully.";
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Invalid file type or size.";
        }
    } else {
        echo "No file uploaded or there was an error.";
    }
}

// Display uploaded files
$sql = "SELECT filename, upload_date FROM uploads ORDER BY upload_date ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Uploaded Files:</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['filename'] . " - " . $row['upload_date'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No files uploaded.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload PDF</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Choose PDF file (max 100KB):</label>
        <input type="file" name="file" id="file" accept="application/pdf" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>