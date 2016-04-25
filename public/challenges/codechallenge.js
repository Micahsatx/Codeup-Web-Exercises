"use strict"


function perfectSquares($a, $b){
var x = $a;
var message;
do {   
    if(($a/2) == $a % 1 === 0){
        console.log($a)
        $a++;
    }else{
        console.log("a is not a perfect square")
    }
} while 
    ($a <= $b)
}

// perfectSquares(3,8);


function calculateTotal($a, $b){
    var $a = 0;
    var $b = 1;
    var $c;
    do {
        $c = $a + $b;
        $b++;
        var finalValue = $c + $b;
    } while
        ($a <= $b);
        console.log(finalValue);
}
calculateTotal(1,5);