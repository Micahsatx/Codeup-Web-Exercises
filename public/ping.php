<?php
require_once '../Input.php';

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

    // if the input DOESNT have a count then set it to =0
    // if it does have a count set count = count
    $count = !(Input::has('count')) ? 0 : Input::get('count');

    return ['count' => $count];
    if($count == 0){

    } else {

    }
}
extract(pagecontroller());
?>

<!DOCTYPE html>
<html>
<head>
    <title>PING</title>
</head>
<body>
    <img src="/img/pingpong.jpg">
<h1>PING</h1>
<p><?= "Score: $count"; ?></p>
<a href="pong.php?count=<?= $count + 1 ?>">Hit!</a>
<a href="pong.php?count= 0">Whiffffff!</a>

</body>
</html>