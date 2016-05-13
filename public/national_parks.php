<?php

require ('../parks_db_credentials.php');
require ('../db_connect.php');
require_once ('../Input.php');



function pageController($dbc)
{
    
    $count = !(Input::has('count')) ? 0 : Input::get('count');
    $offsetNumber = $count * 4; 

    $data = [];
    $stmt = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET {$offsetNumber}");
    $data['parks'] = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $data['count'] = $count;

    return $data;
}
extract(pageController($dbc));




?>

<html>
<head>
    <title>National Parks</title>
</head>
<body>
<?php foreach ($parks as $park): ?>
<h3><?= 'Park Name: ' . $park['name'] . PHP_EOL ?> </h3>
<h3><?= 'Location: ' . $park['location'] . PHP_EOL?> </h3>
<h3><?= 'Date: ' . $park['date_established'] . PHP_EOL?> </h3>
<h3><?= $park['area_in_acres'] . ' acres' . PHP_EOL?> </h3>
<h3><?= '------------------------' . PHP_EOL ?> </h3>
<?php endforeach; ?>
<a href="national_parks.php?count=<?= $count + 1 ?>">Next</a>
<a href="national_parks.php?count=<?= $count - 1 ?>">Previous</a>
</body>
</html>