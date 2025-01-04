<?php
session_start();
$mysqli = new mysqli("localhost", "username", "password", "database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function login($username, $password) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}

function getCategories() {
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM categories");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getProducts($category_id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM product_master WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function displayCart() {
    if (isset($_SESSION['cart'])) {
        $total = 0;
        echo "<h2>Selected Products</h2>";
        echo "<ul>";
        foreach ($_SESSION['cart'] as $product) {
            echo "<li>{$product['name']} - {$product['price']}</li>";
            $total += $product['price'];
        }
        echo "</ul>";
        echo "<h3>Total Amount: $total</h3>";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (login($username, $password)) {
            header("Location: categories.php");
        } else {
            echo "Invalid username or password";
        }
    } elseif (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $product = getProductById($product_id);
        $_SESSION['cart'][] = $product;
    } elseif (isset($_POST['submit_cart'])) {
        displayCart();
    }
}

function getProductById($product_id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM product_master WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Shopping Portal</title>
</head>
<body>
    <?php if (!isset($_SESSION['username'])): ?>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    <?php else: ?>
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <h2>Product Categories</h2>
        <ul>
            <?php foreach (getCategories() as $category): ?>
                <li>
                    <a href="products.php?category_id=<?php echo $category['id']; ?>">
                        <img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
                        <?php echo $category['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>