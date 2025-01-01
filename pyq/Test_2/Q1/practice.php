<?php

    $serverName = "localhost";
    $usrName = "root";
    $pass = "";
    $dbName = "test2q1";

    $conn = new mysqli($serverName,$usrName,$pass,$dbName);

    if($conn->connect_error){
        die("Connection field: ". $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $targetDir = "uploads/";
        $fileName = $_FILES['fileToUpload']['name'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $fileSize = $_FILES['fileToUpload']['size'];
        $tmpDir = $_FILES['fileToUpload']['tmp_name'];

        $uploadOk = 1;
        $uploadDate = date('Y-m-d');

        if($fileSize>1000*1024){
            echo("file is to large");
            $uploadOk = 0;
        }

        if($fileType != "pdf"){
            echo("file should be in pdf format");
            $uploadOk = 0;
        }

        if($uploadOk == 0){
            echo("sorry files is not uploaded");
        }else{
            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            }else{
                if(move_uploaded_file($tmpDir,$targetDir.$fileName)){
                    $sql = "INSERT INTO STUD_MASTER (file_name,upload_time) VALUES('$fileName','$uploadDate')";

                    if($conn->query($sql)=="TRUE"){
                        echo('file is uploaded');
                    }else{
                        echo("Error: ". $conn->connect_error);
                    }

                }
            }
        }

    $conn->close();
    
    }

    ?>

    <html>
        <body>
            <form action="" method="post" enctype="multipart/form-data">
                upload file here: <input type="file" name="fileToUpload"> <input type="submit" value="upload">
            </form>
        </body>
    </html>