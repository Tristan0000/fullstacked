<?php
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $user_name = $_POST['user_name']; 
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {

        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<style type="text/css">
    body{
        background-color: black;
    }

    #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%;

    }

    #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: black;
        border: none;
    }



    #box{
        text-align: center;
        background-color: peachpuff;
        margin: auto;
        width: 300px;
        padding: 50px;
        box-shadow: 0 0 30px white, 0 0 30px;
    }

</style>
<br><br><br><br><br><br><br><br>
<div id="box">

    <form method="post">
        <div style="font-size: 20px;margin: 10px;color: black;">Register</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Register"><br><br>

        <a href="login.php">Login</a><br><br>
    </form>
</div>
</idbody>
</html>