<?php
$number = 15;

if ($number > 0) {
    echo "$number is a positive number.";
    
    if ($number % 2 == 0) {
        echo " It is also an even number.";
    } else {
        echo " It is an odd number.";
    }
} else if ($number < 0) {
    echo "$number is a negative number.";
} else {
    echo "$number is zero.";
}
?>