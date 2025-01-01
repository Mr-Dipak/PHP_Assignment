<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fileName = $_FILES['fileToUpload']['name'];
        echo($fileName);

        echo("<br>");

        $filetype = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
        echo($filetype);

        $uploadOk = 1;

        $temp_location = $_FILES['fileToUpload']['tmp_name'];
        echo("$temp_location");

        $targetDir = "upload/";

        $fileSize = $_FILES['fileToUpload']['size'];


        if($filetype != "pdf"){
            echo("sorry file should be pdf");
            $uploadOk = 0;
        }

        if($fileSize > 1000*1024){
            echo("sorry file is to large");
            $uploadOk = 0;
        }

        if($uploadOk == 0){
           echo("sorry file is not uploaded");
        }else{

            if(!file_exists($targetDir)){
                mkdir($targetDir,0777,true);
            };

                if(move_uploaded_file($temp_location,$targetDir.$fileName)){
                    echo("file uploaded : {$fileName}");
                }
                else{
                    echo("file is not uploaded");
                }
                

        }

        
        
    }

    $files = glob("upload/*.pdf");

    ?>

<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            select PDF to Upload <input type="file" name="fileToUpload"><input type="submit" value="upload">
        </form>
        <h2>Uploaded Files:</h2>
<ul>
    <?php foreach ($files as $file){
        echo("$file");
        ?>

        <li><a href="<?php echo $file; ?>"><?php echo basename($file); ?></a></li>
    
    <?php } ?>
</ul>
    </body>
</html>

