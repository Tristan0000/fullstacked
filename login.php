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
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Foute username of password";
    }else
    {
        echo "Foute username of password";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        <div style="font-size: 20px;margin: 10px;color: black;">Login</div>

        <input id="text" type="text" name="user_name"><br><br>
        <input id="text" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Login"><br><br>

        <a href="signup.php">Register</a><br><br>
    </form>
</div>
</body>
</html>