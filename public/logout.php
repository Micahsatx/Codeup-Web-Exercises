<?php
session_start();
require '../Auth.php';
require '../Input.php';



function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);
}
clearSession();

header('Location: login.php');
die();

?>


<html>
<head>
    <title>Logout Page</title>
</head>
<body>



</body>
</html>