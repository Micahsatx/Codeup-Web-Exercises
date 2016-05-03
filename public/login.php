<?php
session_start();
require 'functions/functions.php';

if(!empty($_POST)){
    if(inputGet('username') == 'guest' && inputGet('password') == 'password' ){
        
       $_SESSION['logged_in_user'] = inputGet('username');
        
        redirect('authorized.php');
    } else {
        echo "Login Failed, Please Try Again";
    }
}

?>




<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="text" name="password"><br>
        <input type="submit">
    </form>
</body>
</html>