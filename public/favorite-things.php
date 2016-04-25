<?php
function randomize() 
{
    $foods = ["bacon", "fried chicken", "french toast", "curry", "banana bread", "cinnamon covered apples", "brussel sprouts", "bison hump", "chili rieno", "ribs", "pinneapple"];
    $adjectives = ["forgiving", "maniacil", "diabolical", "sickly", "friendly", "mutated", "rambunctious", "brilliant", "mad", "gentle", "crazy", "rancid smelling", "fanatical", "suspicious", "flamboyant", "melodramitc"];
    $characters = ["Mario", "Luigi", "Bowser", "Link", "Mega-Man", "Kirby", "Sonic", "Metroid", "Chrono", "Soda Popinski", "Ryu", "Law", "Pac-Man"];
    // pick random index of foods array
    $randomFood = array_rand($foods);
    // pick random index of adjectives array
    $randomAdj = array_rand($adjectives);
    // pick random index of characters arrays
    $randomCharacter = array_rand($characters);
    // //variables for holding the randomly generated adjective and character values (to be inside function)
    $fetchFood = $foods[$randomFood];
    $fetchAdj = $adjectives[$randomAdj];
    $fetchChar = $characters[$randomCharacter];
    //to generate random number
    $number = rand(2, 50);
    
    //combine them with a space
    return $number . " plates of " . $fetchFood . " prepared by a " . $fetchAdj . " " . $fetchChar . PHP_EOL;
}
echo randomize();
?>

<html>
<head>
    <title>Favorite Things</title>
</head>
<body>

</body>
</html>