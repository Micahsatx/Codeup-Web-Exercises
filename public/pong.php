<?php

$count = $_GET['count'];


?>

<!DOCTYPE html>
<html>
<head>
    <title>PONG</title>
</head>
<body>
<h1>PONG</h1>
<p><?= "the count now has a value of $count"; ?></p>
<a href="ping.php?count=<?= $count + 1?>">Return to Ping</a>
<a href="ping.php?count=<?= $count = 0 ?>">Whiffffff!</a>

</body>
</html>