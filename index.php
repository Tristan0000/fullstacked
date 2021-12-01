<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
</head>
<body>

<h1>Hello <?php echo $user_data['user_name']; ?> welkom bij de home page</h1>
<p></p>


<br>

<a href="logout.php">Logout</a>
<style>

#box{
text-align: center;
background-color: peachpuff;
margin: auto;
width: 300px;
padding: 50px;
box-shadow: 0 0 30px white, 0 0 30px;
}


</style>
<div id="box">

</div>

</body>
</html>