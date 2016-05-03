<?php
session_start();
require 'functions/functions.php';

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

