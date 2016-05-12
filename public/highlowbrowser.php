<?php
// setting the values of min/max to the 2 provided arguments.
// not sure i need these two lines since those values are passed into default numbers function
// $minValue = $argv[1];
// $maxValue = $argv[2];

function defaultNumbers($minValue,$maxValue)
{
    // if user doesnt put in a numeric value or no value at all it sets one for them
    if (!is_numeric($minValue))  { 
        $minValue = 1;
    }
    // if user doesnt put in a numeric value or no value at all it sets one for them
    if (!is_numeric($maxValue)){
        $maxValue = 1000000;
    }
}

function randomNumberUserIsGuessing()
{
    session_start();

    // get a random number at set it equal to the variable $numberUserIsGuessing
    $numberUserIsGuessing = mt_rand( $minValue , $maxValue );

    // likely needs to be changed to a variable so it can be used in the html later
    // start the game by telling user what to do
    echo "Alright n00b, im thinking of a number between $minValue and $maxValue, guess what it is to earn some respect\n";


// make sure this step starts a session so that the random number is remembered
// everytime the page changes and spits back to high or to low
}

function usersGuess()
{
    // variable for users input is set to usersGuess variable
    $usersGuess = trim(fgets(STDIN));

    // server needs to give me back a post.  
    // checking their guess will use $_POST superglobal
}

function checktheGuess()
{
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
}

?>

<html>
<head>
    <title>High Low Game</title>
</head>
<body>
    <form method="post">
    Low: <input type="text" name="Low"><br>
    High: <input type="text" name="High"><br>
    <button>Submit</button>
    <br><h1><?= $_POST["Low"] ?></h1><br>
    <br><h1><?= $_POST["High"] ?></h1><br>

</body>
</html>