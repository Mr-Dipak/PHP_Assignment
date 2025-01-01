<?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
if ($num2 != 0) {
    $result = $num1 / $num2;
    echo "Result of Division: " . $result;
} else {
    echo "Division by zero error!";
}
?>