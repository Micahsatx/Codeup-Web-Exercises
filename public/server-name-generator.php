<?php
$adjectives = ['miniature', 'stiff', 'thoughtless', 'obtainable', 'measly', 'venomous', 'silly', 'bizarre', 'apathetic', 'scientific' ];
$nouns = ['dog','nation','fire','scarecrow','jeans', 'snake','science','tail','thunder','ghost'];

$myString = 'hello, world!';

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

// the output of the function must be saved in a variable so it can be used later!
$returnFromRandomAdj = randomizeAdjectives($adjectives);
// the output of the function must be saved in a variable so it can be used later!
$returnFromRandomNoun = randomizeNoun($nouns);

$returnCombine = combine($returnFromRandomNoun, $returnFromRandomAdj);
// var_dump($returnCombine);

?>


<h1><?php echo $returnCombine ?></h1>
