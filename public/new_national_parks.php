<?php
require ('../Input.php');
require ('../parks_db_credentials.php');
require ('../parks_db_connect.php');

function pageController($dbc){
    if (Input::has('name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('animal_poop_prevalence') && Input::has('volcano_danger') ) {
        // user may proceed...
        $stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, animal_poop_prevalence, volcano_danger) VALUES (:name, :location, :date_established, :area_in_acres, :animal_poop_prevalence, :volcano_danger )');
        $stmt->bindValue(':name',  Input::get('name'),  PDO::PARAM_STR);
        $stmt->bindValue(':location',  Input::get('location'),  PDO::PARAM_STR);
        $stmt->bindValue(':date_established',  Input::get('date_established'),  PDO::PARAM_STR);
        $stmt->bindValue(':area_in_acres',  Input::get('area_in_acres'),  PDO::PARAM_INT);
        $stmt->bindValue(':animal_poop_prevalence',  Input::get('animal_poop_prevalence'),  PDO::PARAM_STR);
        $stmt->bindValue(':volcano_danger',  Input::get('volcano_danger'),  PDO::PARAM_STR);

        $stmt->execute();

        header('location:/national_parks.php');
        die;
    } else {
        $message = "Please Fill Out the Form Completely!";
    }
    return ['message' => $message];
}
$message = '';

if (!empty($_POST)){
    extract (pageController($dbc));
}

?>

<h2>Add a National Park</h2>
<?= $message ?>
    <form method="POST" action="/new_national_parks.php">
        <p>
            <input type="text" name="name" placeholder="Park Name: ">
        </p>
        <p>
            <input type="text" name="location" placeholder="Location: ">
        </p>
        <p>
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