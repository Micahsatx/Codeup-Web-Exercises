<?php

require ('../parks_db_credentials.php');
require ('../db_connect.php');
require_once ('../Input.php');


function maxCounter($dbc,$pageLimit){
    // doing a query to find out the number of parks in the database
    $maxCount = 'SELECT count(*) FROM national_parks';
    $maxCount = $dbc->query($maxCount);
    $maxCount = $maxCount->fetchColumn();
    // divide that count by the pagelimit(4)
    $maxCount = $maxCount / $pageLimit;
    // round it so there isnt a decimal place in the number of total pages.
    // maxCount is used later in the next/previous buttons to tell if there is another
    // page or not.
    $maxCount = round($maxCount);
    
    return $maxCount;
}
function paginate($count,$dbc,$pageLimit){
    // establishing where to start on new pages.  take the count and multiply it by 4 to set the offset
    $offsetNumber = $count * $pageLimit; 
    // this design makes it possible for user to input malicious code..
    // $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT {$pageLimit} OFFSET {$offsetNumber}");
    // this design keeps users from inputing malicious code into variables..
    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :pageLimit OFFSET :offsetNumber');

    // binds the variable to :pageLimit.  sets parameter saying it must be an integer
    $stmt->bindValue(':pageLimit',  $pageLimit,  PDO::PARAM_INT);
    // binds the variable to :offsetNumber.  sets parameter saying it must be an integer    
    $stmt->bindValue(':offsetNumber',  $offsetNumber,  PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}

function pageController($dbc)
{

    // setting page limit variable for number of parks shown per page
    $pageLimit = 4;
    // the array of parks
    $data = [];
    // setting the count.  if it has a count use that count, if not set it to 0
    $count = !(Input::has('count')) ? 0 : Input::get('count');

    // go to the database and fetch all the parks and count
    // set them equal to  a variable for usage below
    $data['parks'] = paginate($count, $dbc, $pageLimit);
    $data['count'] = $count;
    
    // send the max to the page so we can use it
    $data['maxCount'] = maxCounter($dbc,$pageLimit);
    
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
    <!-- loops through parks data base and grabs the id's from each park and plugs them into html -->
<?php foreach ($parks as $park): ?>
<h3><?= 'Park Name: ' . $park['name'] . PHP_EOL ?> </h3>
<h3><?= 'Location: ' . $park['location'] . PHP_EOL?> </h3>
<h3><?= 'Date: ' . $park['date_established'] . PHP_EOL?> </h3>
<h3><?= $park['area_in_acres'] . ' acres' . PHP_EOL?> </h3>
<h3><?= 'Animal Excrament Characteristics: ' . $park['animal_poop_prevalence'] . PHP_EOL ?> </h3>
<h3><?= 'Volcanic Danger: ' . $park['volcano_danger'] . PHP_EOL ?> </h3>
<h3><?= '------------------------' . PHP_EOL ?> </h3>
<?php endforeach; ?>

<!-- previous button. as long as the count isnt 0 the previous button will be shows -->
<?php if ($count > 0) { ?>
    <a href="national_parks.php?count=<?= $count - 1 ?>">Previous</a>
<?php } ?>

<!-- as long as the count isnt equal the the maxcount -1 the next button will show
, meaning on the final page we wont see the next button because count is equal to
maxcount -1 -->
<?php if ($count < $maxCount - 1) { ?>
    <a href="national_parks.php?count=<?= $count + 1 ?>">Next</a>
<?php } ?>

<a href="new_national_parks.php">Add a new park!</a>


</body>
</html>