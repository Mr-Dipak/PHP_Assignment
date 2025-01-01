<?php
            if($_SERVER['REQUEST_METHOD']== "POST"){
                $name = $_POST['name'];
                $age = $_POST['age'];

                if($age<18){
                    $message = ("sorry {$name} your not eligible to vote");
                    return;
                }
                else{
                    $message = ("congrates {$name} your eligible to vote");
                }
                header("Location: client.php?message=". urldecode($message));
            };
            ?>