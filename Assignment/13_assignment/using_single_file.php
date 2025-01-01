<html>
    <body>
        <form action="" method="post">
            Name: <input type="text" name="name"><br>
            Age: <input type="number" name="age"><br>
            <input type="submit" value="click me">
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD']== "POST"){
                $name = $_POST['name'];
                $age = $_POST['age'];

                if($age<18){
                    echo("sorry {$name} your not eligible to vote");
                    return;
                };
                echo("congrates {$name} your eligible to vote");
            };
            ?>
    </body>
</html>