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
    <title>counter.php</title>
</head>
<body>
<h1>$_GET => Counter | PHP </h1>
<p><?php echo $count + 0 ?></p>
<!-- we are using echo "<  ?  =" on ?count so that we are changing the URL  -->
<!-- by changing the href url before the ?count  then we are changing a different page -->
<!--  -->
<a href="pong.php?count=<?= $count + 1 ?>">up</a>
<a href="?count=<?= $count - 1 ?>">down</a>

</body>
</html>