<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        $operation = $_POST['operation'];

        $query ="?num1=$num1&num2=$num2";

        switch($operation){
            case 'add':
                header("Location: add.php{$query}");
                break;

            case 'sub':
                header("Location: sub.php{$query}");
                break;
                
            case 'mul' :
                header("Location: mul.php{$query}");
                break;

            case 'div' :
                header("Location: div.php{$query}");
                break;

        }
    }