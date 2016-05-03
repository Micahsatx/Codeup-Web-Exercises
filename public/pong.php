<?php
require_once '../Input.php';

// get the count.  starts with ping.php so doesnt need to find if it has $count value yet
// 
$count = Input::get('count');


?>

<!DOCTYPE html>
<html>
<head>
    <title>PONG</title>
</head>
<body>
    <img src="/img/pingpong.jpg">
<h1>PONG</h1>
<p><?= "Score: $count"; ?></p>
<a href="ping.php?count=<?= $count + 1?>">Hit!</a>
<a href="ping.php?count=<?= $count = 0 ?>">Whiffffff!</a>

</body>
</html>