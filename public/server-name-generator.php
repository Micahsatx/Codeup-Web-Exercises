<?php

function randomizeAdjectives($adjectives) {
    // this line chooses a random index 0-10 from adjectives array
    $randomAdjective = array_rand($adjectives);
    // this line dumps the random index from teh array adjectives
    // var_dump($adjectives[$randomAdjective]);
    return($adjectives[$randomAdjective]);
}

function randomizeNoun($nouns){
    // this line chooses a random index 0-10 from nouns array
    $randomNoun = array_rand($nouns);
    // this line dumps the random index chosen from the array nouns
    // var_dump($nouns[$randomNoun]);
    return($nouns[$randomNoun]); 
} 

function combine($randomNoun, $randomAdjective){
    
    $combinedRandoms = "$randomAdjective" . " " . "$randomNoun";
    return($combinedRandoms);

}



function pageController()
{
    // Initialize an empty data array.
    $data = array();

    // Add data to be used in the html view.
    $adjectives = ['miniature', 'stiff', 'thoughtless', 'obtainable', 'measly', 'venomous', 'silly', 'bizarre', 'apathetic', 'scientific'];
    $nouns = ['dog','nation','fire','scarecrow','jeans', 'snake','science','tail','thunder','ghost'];
    
    // the output of the function must be saved in a variable so it can be used later!
    $returnFromRandomAdj = randomizeAdjectives($adjectives);
    // the output of the function must be saved in a variable so it can be used later!
    $returnFromRandomNoun = randomizeNoun($nouns);

    $returnCombine = combine($returnFromRandomNoun, $returnFromRandomAdj);
    $data['returnCombine'] = $returnCombine;
    return $data;
}
// Call the pageController function and extract all the returned array as local variables.
extract(pageController());
?>








<!DOCTYPE html>
<html>
    <head>
        <title>PHP + HTML</title>
    </head>
    <body>
        <h1><?= $returnCombine; ?></h1>
    </body>
</html>
