<?php
// Start the session
session_start();

// Assign session variables
$_SESSION["username"] = "JohnDoe";
$_SESSION["email"] = "john.doe@example.com";
$_SESSION["role"] = "admin";

// Access session variables
echo "Username: " . $_SESSION["username"] . "<br>";
echo "Email: " . $_SESSION["email"] . "<br>";
echo "Role: " . $_SESSION["role"] . "<br>";

// Destroy session variables
session_unset(); // remove all session variables
session_destroy(); // destroy the session

// Check if session variables are destroyed
if(empty($_SESSION["username"]) && empty($_SESSION["email"]) && empty($_SESSION["role"])) {
    echo "Session variables are destroyed.";
} else {
    echo "Session variables are not destroyed.";
}
?>