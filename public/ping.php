<?php

function pagecontroller(){
    // this if else statement is the same as the ternary written below... they do the same thing
    // if(!isset($_GET['count'])){
    //     $count = 0;
    // } else {
    //     $count = $_GET['count'];
    // }
    // this is the ternary function..same as above..
    // if the get count is NOT set (!isset) then make it equal to 0
    // if it is set make it equal to what it isset to.
    $count = !isset($_GET['count']) ? 0 : $_GET['count'];

    return ['count' => $count];
}
extract(pagecontroller());
?>

<!DOCTYPE html>
<html>
<head>
    <title>PING</title>
</head>
<body>
<h1>PING</h1>
<p><?= "the count now has a value of $count"; ?></p>
<a href="pong.php?count=<?= $count + 1 ?>">Return to Pong</a>
<a href="pong.php?count=<?= $count = 0 ?>">Whiffffff!</a>

</body>
</html>