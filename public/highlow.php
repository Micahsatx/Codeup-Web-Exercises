<?php

// check to see how many values were passed in.  if there arnt 3 (file , min, max)
// then stop the function
if ($argc <3){
    echo "you didnt give me numeric values.  start over and provide a min / max\n";
    exit;
}

// setting the values of min/max to the 2 provided arguments.
$minValue = $argv[1];
$maxValue = $argv[2];

// if user doesnt put in a numeric value or no value at all it sets one for them
if (!is_numeric($minValue))  { 
    $minValue = 1;
}
// if user doesnt put in a numeric value or no value at all it sets one for them
if (!is_numeric($maxValue)){
    $maxValue = 1000000;
}

// get a random number at set it equal to the variable $numberUserIsGuessing
$numberUserIsGuessing = mt_rand( $minValue , $maxValue );

// start the game by telling user what to do
echo "Alright n00b, im thinking of a number between $minValue and $maxValue, guess what it is to earn some respect\n";

// variable for users input is set to usersGuess variable
$usersGuess = trim(fgets(STDIN));

// do the first part of this do/while as long as it is lower or higher than random number
do{    
    if ($usersGuess < $numberUserIsGuessing){
        echo "Wrong, guess HIGHER.\n";
        // `say -v bells wrong wrong wrong wrong please guess higher`;
        $usersGuess = trim(fgets(STDIN));
    } else {
        echo "Wrong, guess LOWER.\n";
        // `say -v bells wrong wrong wrong wrong please guess lower`;l
        $usersGuess = trim(fgets(STDIN));
    }
// do the top part as long as the below statement is NOT TRUE! 
} while ($numberUserIsGuessing != $usersGuess);
// user finally guessed the correct number and won the game
echo "GOOD GUESS EINSTIEN!  1 in 100 were pretty good odds though, just saying\n";