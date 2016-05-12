<?php
session_start();
require '../Auth.php';
require '../Input.php';


// i think this function needs to be removed and replaced with a class Auth something
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