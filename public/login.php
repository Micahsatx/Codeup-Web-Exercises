<?php
session_start();
require '../Auth.php';
require '../Input.php';



// we have to check if the user has submitted something.  this is checking
// on page load if the fields are NOT empty.  if they are not emtpy run the code
if(!empty($_POST)){
    // using the Input class from Input.php  thats why input.php is required
    // at the top of the page
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
    <title>Login Page</title>
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