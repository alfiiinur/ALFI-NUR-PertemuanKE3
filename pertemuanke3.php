<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
        background-color: antiquewhite;
    }

    h2 {
        margin: auto;
        text-align: center;
        padding-top: 10px;
        color: darkgoldenrod;
    }

    h3 {
        color: orange;
        text-align: center;
        padding: 10px;
    }

    form {
        text-align: center;
        padding: 10px
    }

    .center {
        width: 100vw;
        text-align: center;
    }

    input.upload {
        padding-top: 10px;
    }

    input[type=submit] {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        border-radius: 15px;
    }

    input[type=file] {
        background-color: goldenrod;
        /* Green */
        border: none;
        color: white;
        padding: 10px 25px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        border-radius: 15px;
    }
    </style>
</head>

<body>
    <h2>Masukkan Gambar Pada Form Inputan</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="userfile" /> <br>
        <input type="submit" value="upload" name="submit" />
    </form>

    <?php
        if(isset($_POST['submit'])){
            $fileName = basename($_FILES['userfile']['name']); 
            $fileTmpName = $_FILES['userfile']['tmp_name'];
            $ukuran = $_FILES['userfile']['size'];
            $path = "files/".$fileName; 
            
            // move_uploaded_file($fileTmpName,$path);
            // echo $ukuran;
                if($ukuran < 104070){           
                    move_uploaded_file($fileTmpName, 'files/'.$fileName);
                    if($path){
                        echo '<h3>File Sukses di Upload</h3>';
                    }else{
                        echo '<h3>Gagal Mengupload File</h3>';
                    }
                }else{
                    echo '<h3>Ukuran File Terlalu Besar</h3>';
                }
        }
    ?>

    <div class="center">
        <img src="<?php echo $path?>" alt="">
    </div>
</body>

</html>