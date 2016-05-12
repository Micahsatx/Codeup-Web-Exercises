<?php

require ('parks_db_credentials.php');
require ('db_connect.php');


$query = 'DROP TABLE IF EXISTS national_parks';
$dbc->exec($query);

$query = 'CREATE TABLE national_parks(
            id INT UNSIGNED AUTO_INCREMENT,
            name VARCHAR(200) NOT NULL,
            location VARCHAR(200) NOT NULL,
            date_established DATE,
            area_in_acres DOUBLE,
            PRIMARY KEY(id)
)';

$dbc->exec($query);