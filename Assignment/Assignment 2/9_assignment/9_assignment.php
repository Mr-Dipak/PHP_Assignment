<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Function to check if user is logged in
function checkLogin() {
    if (!isset($_SESSION['userid'])) {
        header('Location: login.php');
        exit();
    }
}

// Login user with valid userid & password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE userid = '$userid' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['userid'] = $userid;
        header('Location: books.php');
        exit();
    } else {
        echo "Invalid userid or password.";
    }
}

// Display all available book details
function displayBooks() {
    global $conn;
    $query = "SELECT * FROM book_master";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h3>" . $row['book_title'] . "</h3>";
        echo "<p>Author: " . $row['author'] . "</p>";
        echo "<p>Price: $" . $row['price'] . "</p>";
        echo "<form method='post' action='add_to_cart.php'>";
        echo "<input type='hidden' name='book_id' value='" . $row['id'] . "'>";
        echo "<input type='submit' name='add_to_cart' value='Add to Cart'>";
        echo "</form>";
        echo "</div>";
    }
}

// Save all details in book_purchase table and display bill
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_order'])) {
    $userid = $_SESSION['userid'];
    $total_amount = 0;

    foreach ($_SESSION['cart'] as $book_id) {
        $query = "SELECT * FROM book_master WHERE id = '$book_id'";
        $result = mysqli_query($conn, $query);
        $book = mysqli_fetch_assoc($result);

        $query = "INSERT INTO book_purchase (userid, book_id, price) VALUES ('$userid', '$book_id', '" . $book['price'] . "')";
        mysqli_query($conn, $query);

        $total_amount += $book['price'];
    }

    echo "<h2>Bill</h2>";
    echo "<p>Total Amount: $" . $total_amount . "</p>";

    // Clear the cart
    unset($_SESSION['cart']);
}
?>

<!-- login.php -->
<form method="post" action="">
    <label for="userid">User ID:</label>
    <input type="text" id="userid" name="userid" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" name="login" value="Login">
</form>

<!-- books.php -->
<?php
checkLogin();
displayBooks();
?>

<!-- add_to_cart.php -->
<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $book_id = $_POST['book_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $book_id;
    header('Location: books.php');
    exit();
}
?>

<!-- checkout.php -->
<?php
checkLogin();
?>
<form method="post" action="">
    <input type="submit" name="submit_order" value="Submit Order">
</form>