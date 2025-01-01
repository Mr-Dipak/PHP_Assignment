// used this concept for next question see how actually global variable works in php

<?php

$num1 = 5;
$num2 = 10;
function addNumbers() {
    global $num1, $num2;
    return $num1 + $num2;
}

$result = addNumbers();
echo "The sum of 5 and 10 is: " . $result;
?>