<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "STUD_MASTER";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    // Check if file was uploaded without errors
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = array('pdf');

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) { // 1000 KB
                    if (!is_dir('uploads')) {
                        mkdir('uploads', 0777, true);
                    }
                    $fileNameNew = uniqid('', true) . "." . $fileExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $uploadDate = date('Y-m-d H:i:s');
                    $sql = "INSERT INTO STUD_MASTER (file_name, upload_date) VALUES ('$fileNameNew', '$uploadDate')";

                    if ($conn->query($sql) === TRUE) {
                        echo "File uploaded and record added successfully.";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    }
}

$conn->close();
?>