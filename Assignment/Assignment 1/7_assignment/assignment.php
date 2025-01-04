<?php
    $value = "0";
    $count = "1";
    while ($value <= 50) {
        if ($value % 2 == 0) {
            echo("{$count} even is {$value} <br>");
            $count++;
        }
        $value++;
    }
?>