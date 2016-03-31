"use strict";


// this was the original way of doing it.  It was flawed because it didnt matter if other buttons were pressed before or after.  it just worked as long as the string of 11 buttons was pressed in order at any point.  it also would never tell us when the code was wrong..

    // var keys = [];
    // var code = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
    // var isTheButtonCorrect =
    // $("#whatHappensOnSuccess").hide();

    // $(document).keydown(function(keyEvent) {
    //     console.log(keyEvent.keyCode);
    //     keys.push(keyEvent.keyCode);
    //     // cameron removed this part which breaks the function...yet needs to be removed since the exact konami code must be entered.. start the part where it checks the index.  if the index is incorrect it starts over again
    //     if ( keys.length > code.length ) {
    //         keys.shift();
    //       }
    //     if ( keys.toString() == code.toString() ) {
    //         // $('#whatHappensOnSuccess').slideDown('slow');
    //         openContra();
    //     }

 
    var cheat = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65, 13];
    var index = 0;

    $(document).keydown(function(event){
        console.log(event.keyCode);
        $("#failedKonami").hide();

        if (cheat[index] == event.keyCode){
            index++;
        } else {
            failedCode()
            index = 0;
        }

        if (index == cheat.length) {
            index = 0;
            openContra();
        }
        


    });

    function openContra() {
        window.location = "http://www.8bbit.com/play/contra/1125";
    }
    function failedCode() {
        $("#gameOver").hide();
        $("#failedKonami").show();
    }

