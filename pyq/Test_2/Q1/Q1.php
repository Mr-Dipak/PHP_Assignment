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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['pdfFile']['name']);
    $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $fileSize = $_FILES['pdfFile']['size'];

    // Check if file is a PDF and size is less than 1000KB
    if ($fileType == 'pdf' && $fileSize <= 1000000) {
        if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile)) {
            $uploadDate = date('Y-m-d H:i:s');
            $stmt = $conn->prepare("INSERT INTO STUD_MASTER (file_name, upload_date) VALUES (?, ?)");
            $stmt->bind_param("ss", $uploadFile, $uploadDate);

            if ($stmt->execute()) {
                echo "The file has been uploaded and the record has been added to the database.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only PDF files under 1000KB are allowed.";
    }
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
    <form action="Q1.php" method="post" enctype="multipart/form-data">
        Select PDF to upload:
        <input type="file" name="pdfFile" id="pdfFile">
        <input type="submit" value="Upload PDF" name="submit">
    </form>
</body>
</html>