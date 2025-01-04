<?php
session_start();
$mysqli = new mysqli("localhost", "username", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $userid = $_POST['userid'];
        $password = $_POST['password'];

        $stmt = $mysqli->prepare("SELECT * FROM users WHERE userid = ? AND password = ?");
        $stmt->bind_param("ss", $userid, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['userid'] = $userid;
            header("Location: personal_details.php");
        } else {
            echo "Invalid userid or password.";
        }
    } elseif (isset($_POST['personal_details'])) {
        $_SESSION['personal_details'] = $_POST;
        header("Location: education_details.php");
    } elseif (isset($_POST['education_details'])) {
        $_SESSION['education_details'] = $_POST;
        header("Location: review.php");
    } elseif (isset($_POST['submit'])) {
        $userid = $_SESSION['userid'];
        $personal_details = $_SESSION['personal_details'];
        $education_details = $_SESSION['education_details'];

        $stmt = $mysqli->prepare("INSERT INTO user_details (userid, name, age, address, degree, university, year) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissss", $userid, $personal_details['name'], $personal_details['age'], $personal_details['address'], $education_details['degree'], $education_details['university'], $education_details['year']);
        $stmt->execute();

        echo "Details saved successfully.";
        session_destroy();
    }
}
?>

<!-- login.php -->
<form method="post" action="">
    UserID: <input type="text" name="userid" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
</form>

<!-- personal_details.php -->
<form method="post" action="">
    Name: <input type="text" name="name" required><br>
    Age: <input type="number" name="age" required><br>
    Address: <input type="text" name="address" required><br>
    <input type="submit" name="personal_details" value="Next">
</form>

<!-- education_details.php -->
<form method="post" action="">
    Degree: <input type="text" name="degree" required><br>
    University: <input type="text" name="university" required><br>
    Year: <input type="number" name="year" required><br>
    <input type="submit" name="education_details" value="Next">
</form>

<!-- review.php -->
<?php
echo "Name: " . $_SESSION['personal_details']['name'] . "<br>";
echo "Age: " . $_SESSION['personal_details']['age'] . "<br>";
echo "Address: " . $_SESSION['personal_details']['address'] . "<br>";
echo "Degree: " . $_SESSION['education_details']['degree'] . "<br>";
echo "University: " . $_SESSION['education_details']['university'] . "<br>";
echo "Year: " . $_SESSION['education_details']['year'] . "<br>";
?>
<form method="post" action="">
    <input type="submit" name="submit" value="Submit">
</form>