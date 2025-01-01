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
    if ($fileType == 'pdf' && $fileSize <= 1000 * 1024) {
        if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile)) {
            $uploadDate = date('Y-m-d H:i:s');
            $sql = "INSERT INTO STUD_MASTER ({$uploadFile}, {$uploadDate}) VALUES ('$uploadFile', '$uploadDate')";
    
            if ($conn->query($sql) === TRUE) {
                echo "The file has been uploaded and the record has been added to the database.";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only PDF files under 1000KB are allowed.";
    }
    
        $conn->close();
    }
    ?>
        
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>File Upload</title>
    </head>
    <body>
        <form action="Q1.php" method="post" enctype="multipart/form-data">
            <label for="pdfFile">Upload PDF:</label>
            <input type="file" name="pdfFile" id="pdfFile" accept="application/pdf" required>
            <button type="submit">Upload</button>
        </form>
    </body>
    </html>

    input