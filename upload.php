<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

$conn=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn)
{
    die("failed to connect!");
}
else{
    if (isset($_POST['submit'])){
        $result="";
        $image='image/'.$_FILES['image']['name'];
        $image=mysqli_real_escape_string($conn, $image);

        if(preg_match("!image!", $_FILES['image']['type'])){
            if(copy($_FILES['image']['tmp_name'], $image)){
                $query="INSERT INTO imageupload(imagepath)VALUES('$image')";
                if(mysqli_query($conn,$query)){
                    $result="Image Successfully Uploaded!";
                }
                else{
                    $result="Image Upload Failed!";
                }
            }
            else{
                $result="Image Upload Failed!";
            }
        }
        else{
            $result="Only Upload JPG, PNG & GIF Images!";
        }
    }
}
mysqli_close($conn);
?>

<! DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body{
            background-color: black;
        }
        .main{
            text-align: center;
            background-color: peachpuff;
            margin: 20px auto;
            width: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 30px white, 0 0 30px;
        }
        label{
            font-size: 20px;
            text-shadow: 1px 1px 1px white;
            font-weight: bold;
        }
        .input{
        width: 100%;
        padding: 12px;
        margin: 20px 0 20px 0;
        font-size: 15px;
        background-color: #black;
        box-shadow: 2px 2px 5px #555;
        cursor: pointer;
        }
        .input:focus{
            outline: none;
        }
        .button{
            width: 50%;
            padding: 10px;
            font-size: 20px;
            background-color: black;
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="main">
    <form action="" method="POST" enctype="multipart/form-d">
        <label for="image">Upload image</label>
        <hr>
        <input type="file" name="image" class="input" required>
        <input type="submit" name="submit" value="Upload" class="button">
    </form><br>
    <h2><?= $result ?></h2>
</div>
<div class="previewImage"><img src="<?= $image ?>"></div>
</body>
</html>