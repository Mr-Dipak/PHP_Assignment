<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Function to check login
function check_login($username, $password) {
    global $conn;
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        return true;
    } else {
        return false;
    }
}

// Handle login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (check_login($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: personal_details.php");
    } else {
        echo "Invalid username or password";
    }
}

// Handle personal details
if (isset($_POST['personal_details'])) {
    $_SESSION['personal_details'] = $_POST;
    header("Location: education_details.php");
}

// Handle education details
if (isset($_POST['education_details'])) {
    $_SESSION['education_details'] = $_POST;
    header("Location: review.php");
}

// Handle final submission
if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $personal_details = $_SESSION['personal_details'];
    $education_details = $_SESSION['education_details'];

    $query = "INSERT INTO user_details (username, personal_details, education_details) VALUES ('$username', '" . json_encode($personal_details) . "', '" . json_encode($education_details) . "')";
    mysqli_query($conn, $query);

    session_destroy();
    echo "Details saved successfully!";
}
?>

<!-- Login Form -->
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
</form>

<!-- Personal Details Form -->
<form method="post" action="">
    Name: <input type="text" name="name" required><br>
    Age: <input type="number" name="age" required><br>
    Address: <input type="text" name="address" required><br>
    <input type="submit" name="personal_details" value="Next">
</form>

<!-- Education Details Form -->
<form method="post" action="">
    Degree: <input type="text" name="degree" required><br>
    University: <input type="text" name="university" required><br>
    Year of Passing: <input type="number" name="year_of_passing" required><br>
    <input type="submit" name="education_details" value="Next">
</form>

<!-- Review and Submit Form -->
<form method="post" action="">
    <h3>Review Your Details</h3>
    <p>Name: <?php echo $_SESSION['personal_details']['name']; ?></p>
    <p>Age: <?php echo $_SESSION['personal_details']['age']; ?></p>
    <p>Address: <?php echo $_SESSION['personal_details']['address']; ?></p>
    <p>Degree: <?php echo $_SESSION['education_details']['degree']; ?></p>
    <p>University: <?php echo $_SESSION['education_details']['university']; ?></p>
    <p>Year of Passing: <?php echo $_SESSION['education_details']['year_of_passing']; ?></p>
    <input type="submit" name="submit" value="Submit">
</form>