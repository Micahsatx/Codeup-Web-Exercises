<?php

require ('../parks_db_credentials.php');
require ('../db_connect.php');
require_once ('../Input.php');



function pageController($dbc)
{
    $pageLimit = 4;
    $count = !(Input::has('count')) ? 0 : Input::get('count');
    $offsetNumber = $count * $pageLimit; 

    $data = [];
    $stmt = $dbc->query("SELECT * FROM national_parks LIMIT {$pageLimit} OFFSET {$offsetNumber}");
    $data['parks'] = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $data['count'] = $count;
    
// do a queryto find out how many parks. 
// divide that count / 4
// after finding the count use the function that rounds that down. ? floor?
    $maxCount = 'SELECT count(*) FROM national_parks';
    $maxCount = $dbc->query($maxCount);
    $maxCount = $maxCount->fetchColumn();
    $maxCount = $maxCount / $pageLimit;
    $maxCount = round($maxCount);


// send the max to the page so we can use it
    $data['maxCount'] = $maxCount;

    return $data;
}
extract(pageController($dbc));


?>

<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" href="/css/national_parks.css">
</head>
<body>
<?php foreach ($parks as $park): ?>
<h3><?= 'Park Name: ' . $park['name'] . PHP_EOL ?> </h3>
<h3><?= 'Location: ' . $park['location'] . PHP_EOL?> </h3>
<h3><?= 'Date: ' . $park['date_established'] . PHP_EOL?> </h3>
<h3><?= $park['area_in_acres'] . ' acres' . PHP_EOL?> </h3>
<h3><?= '------------------------' . PHP_EOL ?> </h3>
<?php endforeach; ?>

<?php if ($count > 0 && $count < $maxCount) { ?>
<a href="national_parks.php?count=<?= $count - 1 ?>">Previous</a>
<?php } ?>

<?php if ($count < $maxCount - 1) { ?>
<a href="national_parks.php?count=<?= $count + 1 ?>">Next</a>
<?php } ?>



   
</body>
</html>