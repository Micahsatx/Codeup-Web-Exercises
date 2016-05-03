<?php
session_start();
require 'functions/functions.php';


function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server and send the client a new cookie
    session_regenerate_id(true);
}
clearSession();

redirect('login.php');


?>


<html>
<head>
    <title>Logout Page</title>
</head>
<body>



</body>
</html>