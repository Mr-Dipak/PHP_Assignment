<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $image = $_FILES["image"]["name"];
    $target_dir = "impfile/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false && $_FILES["image"]["size"] < 100000 && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO emp (name, email, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $image);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>

<form method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    Image: <input type="file" name="image" accept="image/*" required>
    <input type="submit" value="Submit">
</form>