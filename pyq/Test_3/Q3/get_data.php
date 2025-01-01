<?php

    session_start();

    if(isset($_SESSION['username'])){
        $userName = $_SESSION['username'];
        $email = $_SESSION['email'];

        echo("

        UserName: {$userName} <br>
        Email: {$email}
        
        ");

    }else{
        echo("please log in!");
    }
    