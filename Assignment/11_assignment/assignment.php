<?php
// Demonstrating the use of static and global variables in PHP

// Global variable
$globalVar = 10;


function demonstrateVariables() {
    // Static variable
    static $staticVar = 0;

    // Accessing global variable
    global $globalVar;

    // Incrementing the static variable
    $staticVar++;
    
    // Incrementing the global variable
    $globalVar++;

    echo "Static Variable: $staticVar<br>";
    echo "Global Variable: $globalVar<br>";
}

echo "Initial Global Variable: $globalVar<br>";
demonstrateVariables();
demonstrateVariables();
demonstrateVariables();
echo "Final Global Variable: $globalVar<br>";
?>