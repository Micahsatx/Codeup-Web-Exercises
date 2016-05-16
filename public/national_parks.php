<?php

require ('../parks_db_credentials.php');
require ('../db_connect.php');
require_once ('../Input.php');



function pageController($dbc)
{
    // setting page limit variable for number of parks shown per page
    $pageLimit = 4;
    // setting the count.  if it has a count use that count, if not set it to 0
    $count = !(Input::has('count')) ? 0 : Input::get('count');
    // establishing where to start on new pages.  take the count and multiply it by 4 to set the offset
    $offsetNumber = $count * $pageLimit; 

    // the array of parks
    $data = [];
    // this design makes it possible for user to input malicious code..
    // $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT {$pageLimit} OFFSET {$offsetNumber}");
    // this design keeps users from inputing malicious code into variables..
    $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :pageLimit OFFSET :offsetNumber');

    // binds the variable to :pageLimit.  sets parameter saying it must be an integer
    $stmt->bindValue(':pageLimit',  $pageLimit,  PDO::PARAM_INT);
    // binds the variable to :offsetNumber.  sets parameter saying it must be an integer    
    $stmt->bindValue(':offsetNumber',  $offsetNumber,  PDO::PARAM_INT);

    $stmt->execute();

    // go to the database and fetch all the parks and count
    // set them equal to  a variable for usage below
    $data['parks'] = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $data['count'] = $count;
    
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


    // send the max to the page so we can use it
    $data['maxCount'] = $maxCount;
    
    // checking to make sure the form has every field filled out.  if it doesnt it should reload form
    // and alert user of fail.  it however errors out.  it does warn them but forces you to reload the page
    if (Input::has('name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('animal_poop_prevalence') && Input::has('volcano_danger') ) {
           
            // preparing the data from the form to be binded to the proper fields.
            $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, animal_poop_prevalence, volcano_danger) VALUES (:name, :location, :date_established, :area_in_acres, :animal_poop_prevalence, :volcano_danger )');
            $stmt->bindValue(':name',  Input::get('name'),  PDO::PARAM_STR);
            $stmt->bindValue(':location',  Input::get('location'),  PDO::PARAM_STR);
            $stmt->bindValue(':date_established',  Input::get('date_established'),  PDO::PARAM_STR);
            $stmt->bindValue(':area_in_acres',  Input::get('area_in_acres'),  PDO::PARAM_INT);
            $stmt->bindValue(':animal_poop_prevalence',  Input::get('animal_poop_prevalence'),  PDO::PARAM_STR);
            $stmt->bindValue(':volcano_danger',  Input::get('volcano_danger'),  PDO::PARAM_STR);

            $stmt->execute();
    }


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

<!-- form for submitting a new park -->
<h2>Add a National Park</h2>
<?php 
    // this submit button will only work if all fields "has" info in it
    if (Input::has('submit')) 
    {
        // if every field is filled in sumbit button will work
        if (
            (Input::has('name') && (Input::get('name')!="")) &&
            (Input::has('location') && (Input::get('location')!="")) &&
            (Input::has('date_established') && (Input::get('date_established')!="")) &&
            (Input::has('area_in_acres') && (Input::get('area_in_acres')!="")) &&
            (Input::has('animal_poop_prevalence') && (Input::get('animal_poop_prevalence')!="")) &&
            (Input::has('volcanic_danger') && (Input::get('volcanic_danger')!=""))
            )
        {
            echo "Database Updated!";
        // if fields are left empty give this error message.  but also error like crazy
        } else {
            echo "Please Fill Out the Form Completely!";
        }
    }
?>
    <!-- where the form is posting to.. (itself) -->
    <form method="POST" action="/national_parks.php">
        <p>
            <input type="text" name="name" placeholder="Park Name: ">
        </p>
        <p>
            <input type="text" name="location" placeholder="Location: ">
        </p>
        <p>
            <!-- type is date so that is reformats the same as the datatype set in mysql migration file -->
            <input type="date" name="date_established" placeholder="Date: YYYY-MM-DD ">
        </p>
        <p>
            <input type="text" name="area_in_acres" placeholder="Area In Acres: ">
        </p>
        <p>
            <input type="text" name="animal_poop_prevalence" placeholder="Animal Poop Characteristics: ">
        </p>
        <p>
            <input type="text" name="volcano_danger" placeholder="Volcano Danger: ">
        </p>
        
        <button type="Submit">Submit</button>
    </form>


</body>
</html>