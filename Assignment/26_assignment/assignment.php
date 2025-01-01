<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fileName = $_FILES['fileToUpload']['name'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        echo($fileType);
        $fileSize = $_FILES['fileToUpload']['size'];
        $tmpDir = $_FILES['fileToUpload']['tmp_name'];
        $targetDir = "impfile/";
        $uploadOk = 1;

        if($fileSize > 1000*1024){
            echo("file is too large");
            $uploadOk = 0;
        }
        
        if($fileType != "jpg"){
            echo("file should be in jpg,jpeg or png format");
            $uploadOk = 0;
        }

        if($uploadOk == 0){
            echo("sorry file is not uploaded");
        }

            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            }else{
                if(move_uploaded_file($tmpDir,$targetDir.$fileName)){
                    echo("file uploaded");
                }else{
                    echo("file is not uploaded");
                }
            }
                    
        }
        
        ?>

        <html>
            <body>
                <form action="" method="post" enctype="multipart/form-data">
                    select image to upload <input type="file" name="fileToUpload"><input type="submit" value="upload">
                </form>
            </body>