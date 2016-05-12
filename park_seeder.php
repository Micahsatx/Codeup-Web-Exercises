<?php

require ('parks_db_credentials.php');
require ('db_connect.php');

$query = 'TRUNCATE national_parks';
// TRUNCATE TABLE national_parks;
$dbc->exec($query);


$parks = [
    ['name'=>'Joshua Tree', 'location'=> 'California','date_established'=>'1994-10-31','area_in_acres'=> '789745'],
    ['name'=>'Mammoth Cave','location'=> 'Kentucky','date_established'=>'1941-07-01','area_in_acres'=>'52830'],
    ['name'=>'Olympic','location'=>'Washington','date_established'=>'1938-06-29','area_in_acres'=>'922650'],
    ['name'=>'Petrified Forest','location'=>'Arizona','date_established'=>'1962-12-09','area_in_acres'=>'93532'],
    ['name'=>'Pinnacles','location'=>'California','date_established'=>'2013-01-10', 'area_in_acres'=>'26605'],
    ['name'=>'Redwood','location'=>'California','date_established'=>'1968-10-02','area_in_acres'=>'112512'],
    ['name'=>'Seguaro','location'=>'Arizona','date_established'=>'1994-10-14','area_in_acres'=>'673572'],
    ['name'=>'Sequoia','location'=>'California','date_established'=>'1890-09-25','area_in_acres'=>'1039137'],
    ['name'=>'Wind Cave','location'=>'South Dakota','date_established'=>'1903-01-09','area_in_acres'=>'542022'],
    ['name'=>'Yellowstone','location'=>'Wyoming, Montana, Idaho','date_established'=>'1872-03-01','area_in_acres'=>'2219790']
];

foreach($parks as $park) {
    $query = 'INSERT INTO national_parks (name, location, date_established, area_in_acres) 
    VALUES ("' . $park['name'] . '", "' . $park['location'] . '", "' . $park['date_established'] . '", "' . $park['area_in_acres'] . '")';
    $dbc->exec($query);
};


