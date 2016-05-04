<?php
session_start();
require '../Auth.php';
require '../Input.php';




if(!empty($_POST)){
    $username = Input::get('username');
    $password = Input::get('password');

    if(Auth::attempt($username, $password)){
       
       
       Auth::user(); 
       $_SESSION['logged_in_user'] = Input::get('username');
        
        header('Location: authorized.php');
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