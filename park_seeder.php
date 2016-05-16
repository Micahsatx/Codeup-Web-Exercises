<?php

require ('parks_db_credentials.php');
require ('db_connect.php');

$query = 'TRUNCATE national_parks';
// TRUNCATE TABLE national_parks;
$dbc->exec($query);


$parks = [
    ['name'=>'Joshua Tree', 'location'=> 'California','date_established'=>'1994-10-31','area_in_acres'=> '789745', 'animal_poop_prevalence' => 'Prehistoric Poop', 'volcano_danger' => 'Minor Danger'],
    ['name'=>'Mammoth Cave','location'=> 'Kentucky','date_established'=>'1941-07-01','area_in_acres'=>'52830','animal_poop_prevalence' => 'DANGER! MAMMOTH POOP', 'volcano_danger' => 'Minor Danger'],
    ['name'=>'Olympic','location'=>'Washington','date_established'=>'1938-06-29','area_in_acres'=>'922650','animal_poop_prevalence' => 'Triumphant Poops', 'volcano_danger' => 'Moderate Danger'],
    ['name'=>'Petrified Forest','location'=>'Arizona','date_established'=>'1962-12-09','area_in_acres'=>'93532','animal_poop_prevalence' => 'Rock Poops', 'volcano_danger' => 'Ancient Danger'],
    ['name'=>'Pinnacles','location'=>'California','date_established'=>'2013-01-10', 'area_in_acres'=>'26605','animal_poop_prevalence' => 'Poop Stacked High', 'volcano_danger' => 'Localized Danger'],
    ['name'=>'Redwood','location'=>'California','date_established'=>'1968-10-02','area_in_acres'=>'112512','animal_poop_prevalence' => 'Old Poop', 'volcano_danger' => 'No Danger'],
    ['name'=>'Seguaro','location'=>'Arizona','date_established'=>'1994-10-14','area_in_acres'=>'673572','animal_poop_prevalence' => 'Sandy Poops', 'volcano_danger' => 'No Danger'],
    ['name'=>'Sequoia','location'=>'California','date_established'=>'1890-09-25','area_in_acres'=>'1039137','animal_poop_prevalence' => 'Hippy Poops', 'volcano_danger' => 'Minor Danger'],
    ['name'=>'Wind Cave','location'=>'South Dakota','date_established'=>'1903-01-09','area_in_acres'=>'542022','animal_poop_prevalence' => 'Ghost Poops', 'volcano_danger' => 'Moderate Danger'],
    ['name'=>'Yellowstone','location'=>'Wyoming, Montana, Idaho','date_established'=>'1872-03-01','area_in_acres'=>'2219790','animal_poop_prevalence' => 'Variety may vary', 'volcano_danger' => 'EXTREME DANGER']
];


$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, animal_poop_prevalence, volcano_danger) VALUES (:name, :location, :date_established, :area_in_acres, :animal_poop_prevalence, :volcano_danger )');

foreach ($parks as $park) {
    $stmt->bindValue(':name',  $park['name'],  PDO::PARAM_STR);
    $stmt->bindValue(':location',  $park['location'],  PDO::PARAM_STR);
    $stmt->bindValue(':date_established',  $park['date_established'],  PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres',  $park['area_in_acres'],  PDO::PARAM_INT);
    $stmt->bindValue(':animal_poop_prevalence',  $park['animal_poop_prevalence'],  PDO::PARAM_STR);
    $stmt->bindValue(':volcano_danger',  $park['volcano_danger'],  PDO::PARAM_STR);


    $stmt->execute();
};



