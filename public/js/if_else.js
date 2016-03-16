"use strict";
// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];
var message;
var favorite = 'blue'; // TODO: change this to your favorite color from the list

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
console.log(color);

if(color == "red") {
    message = "Red is the color of a firetruck";

}
else if(color == "orange") {
    message = "Orange is a color no one should ever wear to a wedding";
}
else if(color == "yellow") {
    message = "When you are dehydrated your pee is yellow";
}
else if(color == "green") {
    message = "Green is the color of chlorophil.  The checmical that converts sunlight into energy for plants!";
}
else if(color == "blue") {
    message = "Blue is the best color.  the ocean, the sky, and even the berry";
} else {
    message = "Im pretending to not know anything about these colors. But actually i love them!";
}
    console.log(message)

message = (color == favorite) ? "This is my favorite" : "at least it is not salmon";
console.log(message);
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
