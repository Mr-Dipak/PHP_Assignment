<html>
    <body>
        <form action="check.php" method="post">
            Name: <input type="text" name="name"><br>
            Age: <input type="number" name="age"><br>
            <input type="submit" value="click me">
        </form>

        <?php
            if(isset($_GET['message'])){
                echo "<p>" .$_GET['message'] . "</p>";
            }
        ?>
       
    </body>
</html>