<?php
session_start();
require 'functions/functions.php';
require_once '../Auth.php';


Auth::check();
// i think this is missing the page controller?

// function pageController()
// {
//     if(!Auth::check()){
//         header('location: login.php');
//         exit();
//     }

//     return [
//         'username' =. 'guest'
//     ];
// }
// session_start();
// extract(pageController());

?>

<html>
<head>
    <title>Authorization Page</title>
</head>
<body>
    <h1>Authorized</h1>
    <p>
        <?php 
        if ($_SESSION['logged_in_user']): ?>
            Welcome, <?= $_SESSION['logged_in_user']; ?>
        <?php else:
            redirect('login.php');
        ?>    
        <?php endif ?>
    </p>
    <a href="logout.php">Logout</a>


</body>
</html>

