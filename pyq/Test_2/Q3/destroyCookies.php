<?php

    // Set the cookies with an expiration time in the past
    setcookie("user", "", time() - 3600); 
    setcookie("password", "", time() - 3600);
    echo("Cookies are destroyed!");

?>