<?php

require_once 'Model.php';

$model = new Model();

$model->name = "Micah Johnson";
$model->birthday =  "07/20/1983";
$model->eyeColor = "blue";
$model->car = "AMG S65 Coupe";
$model->offSpring = "Declan and one on the way";


var_dump($model);