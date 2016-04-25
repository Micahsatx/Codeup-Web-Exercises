"use strict";


function generateRandomNumber (min, max){
    var randomNumberBetween2and20 = Math.floor(Math.random() * (max - min) + 1) + min;
    var randomNumber = Math.floor(Math.random() * max);

    if(randomNumberBetween2and20 % 2 == 0){
        console.log(randomNumberBetween2and20);
    } else {
        console.log("the number was odd")
        generateRandomNumber(1, 20);
    }
}
generateRandomNumber(1, 20);


// zach's solution
// do {
//     var randomNumberBetween2and20 = Math.floor(Math.random() * (20 - 1) + 1) + 1;   
// } while (randomNumberBetween2and20 % 2 == 1);

