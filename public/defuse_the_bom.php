<!DOCTYPE html>
<html>
<head>
    <title>Defuse the BOM</title>
</head>
<body>
    <h2 id="message">This BOM will self destruct in <span id="timer">5</span> seconds...</h2>

    <button id="defuser">Defuse the BOM</button>

    <script>
        var detonationTimer = 5;
        var intervalId = setInterval(updateTimer, 1000);
        // TODO: This function needs to be called once every second
        function updateTimer()
        {
            if (detonationTimer == 0) {
                alert('EXTERMINATE!');
                document.body.innerHTML = '';
            } else if (detonationTimer > 0) {
                document.getElementById('timer').innerHTML = detonationTimer;
                console.log("Tick Tock");
            }

            detonationTimer--;
        }

        // The function below is not useful because the function is already written at the top. 
        //  just call the function at the top.   this following line was requiered at the top and also
        //  called down at the bottom var intervalId = setInterval(updateTimer, 1000);
       
        // var count = 0;
        // var max = 5;
        // var interval = 1000;

        // var intervalTicker = setInterval(function (){
        //     if (count >= max){
        //         clearInterval(intervalTicker);
        //         console.log("Clicky Clicky");
        //     } else {
        //         count++;
        //         console.log("Tick Tock");
        //     }
        // }, interval);

        // TODO: When this function runs, it needs to
        // cancel the interval/timeout for updateTimer()
        function defuseTheBOM()
        {
        
        // This clear interval is linked to the interval ID at the top.
        // so the output of the function up top will be halted when the clearInterval
        // is ran.  therefore stopping the function therefore diffusing the bomb
            clearInterval(intervalId);
            alert("Good Job McGuyver, you diffused the Bomb")
        }

        // Don't modify anything below this line!
        //
        // This causes the defuseTheBOM() function to be called
        // when the "defuser" button is clicked.
        // We will learn about events in the DOM lessons
        var defuser = document.getElementById('defuser');
        defuser.addEventListener('click', defuseTheBOM, false);
    </script>
</body>
</html>
