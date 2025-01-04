<!-- 14.Write code that will accept details of student like name, age, gender, address,
course, hobbies and display entered information on webpage using PHP -->


<html>
    <body>
       <form action=""method="post">
       name: <input type="text" name="name"><br>
        age: <input type="number" name="age"><br>
        gender: <input type="radio" value="male" name="gender"> male <input type="radio" value="female" name="gender"> female <br>
        Address: <textarea name="address" id="" name="address" placeholder="address should be here"></textarea><br>
        <input type="submit"value='click me'>
       </form>
        <?php
            if($_SERVER["REQUEST_METHOD"]=='POST'){
                $name = $_POST['name'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $address = $_POST['address'];

                echo(
                    "<table border='1'>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>address</th>
                        </tr>
                        <tr>
                            <td>{$name}</td>
                            <td>{$age}</td>
                            <td>{$gender}</td>
                            <td>{$address}</td>

                        </tr>

                    </table>
                    "
                    );
            }

                
            


            ?>
    </body>
</html>