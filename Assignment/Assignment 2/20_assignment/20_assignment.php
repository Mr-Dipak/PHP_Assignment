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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image'];

    // Check if image file is a actual image or fake image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Check file size
    if ($image["size"] > 100000) {
        die("Sorry, your file is too large.");
    }

    // Specify the directory where the file is going to be placed
    $target_dir = "impfile/";
    $target_file = $target_dir . basename($image["name"]);

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO emp (name, email, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $target_file);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Form</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Image: <input type="file" name="image" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>