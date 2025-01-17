<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vormen zonder Canvas</title>
    <style>
        html, body {
            height: 100%;
            overflow: hidden; /* Voorkom scrollen */
            margin: 0;
            background-color: #FBF5E5;
        }
        body {
            display: flex;
            flex-direction: column; /* Zorgt ervoor dat de navbar bovenaan staat */
            position: relative;
        }
        nav {
            background-color: #C890A7; /* Zelfde kleur als de vormen */
            padding: 40px; /* Grotere padding voor een hogere navbar */
            text-align: center;
            font-size: 24px; /* Grotere tekst voor de navbar */
            color: white; /* Witte tekstkleur */
            border: 4px solid #212121;
        }
        #shapes {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1; /* Zorgt ervoor dat shapes de rest van de ruimte opvullen */
            position: relative; /* Voor de absolute positionering van vormen */
        }

        /* Stijlen voor cirkels en rechthoeken */
        .shape {
            border: 4px solid #212121;
            position: absolute;
            opacity: 0.4; /* Opacity ingesteld op 0.4 */
        }
        .circle {
            border-radius: 50%;
        }
        .rectangle {
            /* Geen extra styling nodig voor rechthoeken */
        }

        /* Cirkels */
        #circle { width: 80px; height: 180px; top: 150px; right: 100px; transform: rotate(130deg); }
        #circle1 { width: 80px; height: 280px; top: 250px; left: 350px; transform: rotate(-45deg); }
        #circle2 { width: 80px; height: 193px; top: 150px; left: 1100px; transform: rotate(30deg); }
        #circle3 { width: 80px; height: 180px; top: 550px; left: 800px; transform: rotate(30deg); }
        #circle4 { width: 80px; height: 180px; top: 150px; left: 110px; transform: rotate(30deg); }
        #circle5 { width: 80px; height: 180px; top: 550px; left: 400px; transform: rotate(30deg); }

        /* Rechthoeken */
        #rectangle { width: 150px; height: 180px; top: 600px; left: 50px; transform: rotate(40deg); }
        #rectangle1 { width: 150px; height: 100px; top: 500px; left: 1200px; transform: rotate(-30deg); }
        #rectangle2 { width: 150px; height: 100px; top: 400px; left: 600px; transform: rotate(20deg); }
        #rectangle3 { width: 150px; height: 100px; top: 600px; left: 1000px; transform: rotate(20deg); }
        #rectangle4 { width: 150px; height: 100px; top: 400px; left: 100px; transform: rotate(20deg); }
        #rectangle5 { width: 150px; height: 100px; top: 123px; left: 450px; transform: rotate(20deg); }

        .QuizCraft {
            width: 350px;
            height: 100px;
            background-color: #A35C7A;
            position: absolute;
            top: 200px; /* Plaats de bovenkant in het midden van het scherm */
            left: 50%; /* Plaats de linkerkant in het midden van het scherm */
            transform: translate(-50%, -50%); /* Verschuif naar het midden */
            display: flex; /* Gebruik flexbox voor centreren */
            justify-content: center; /* Horizontaal centreren */
            align-items: center; /* Verticaal centreren */
            border-radius: 20px;
            border: 4px solid #212121;
            text-decoration: none; /* Geen onderstreping */
            color: white; /* Witte tekstkleur */
            cursor: pointer; /* Cursor verandert naar pointer */
        }
        .QuizCraft h1 {
            text-align: center; /* Center tekst */
            font-size: 30px;
        }
        .container {
            display: flex; 
            flex-direction: column;
            align-items: center;
            justify-content: center; 
            position: absolute; 
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%); 
            background-color: #C890A7;
            width: 400px;
            height: 200px;
            border-radius: 20px;
            border: 4px solid #212121;
        }   
        .code-input {
            width: 250px;                      /* Breedte van het invoerveld */
            padding: 12px;  
            margin: 20px;                   /* Ruimte binnen het invoerveld */
            border: 2px solid #A35C7A;         /* Randkleur die overeenkomt met de achtergrond */
            border-radius: 10px;               /* Ronde hoeken */
            font-size: 18px;                   /* Lettergrootte */
            color: #333;                       /* Tekstkleur */
            background-color: #e0dede;         /* Achtergrondkleur van het invoerveld */
            transition: border-color 0.3s;     /* Animatie voor randkleur */
        }
        .code-input:focus {
            outline: none;                     /* Verwijder standaard focusring */
            border-color: #4CAF50;             /* Randkleur bij focus */
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5); /* Schaduw bij focus */
        }
        .join-button {
            width: 100px;
            height: 40px;
            border-radius: 20px;
            background-color: #4CAF50; /* Groene achtergrondkleur */
            color: white; /* Witte tekstkleur */
            border: none; /* Geen rand */
            cursor: pointer; /* Cursor verandert naar pointer */
        }
        .join-button:hover {
            background-color: #66BB6A; /* Lichtere groene kleur bij hover */
        }
    </style>
</head>
<body>
    <nav></nav> <!-- Nav blijft, maar zonder tekst -->
    <div id="shapes">
        <div id="circle" class="shape circle"></div>
        <div id="circle1" class="shape circle"></div>
        <div id="circle2" class="shape circle"></div>
        <div id="circle3" class="shape circle"></div>
        <div id="circle4" class="shape circle"></div>
        <div id="circle5" class="shape circle"></div>
        <div id="rectangle" class="shape rectangle"></div>
        <div id="rectangle1" class="shape rectangle"></div>
        <div id="rectangle2" class="shape rectangle"></div>
        <div id="rectangle3" class="shape rectangle"></div>
        <div id="rectangle4" class="shape rectangle"></div>
        <div id="rectangle5" class="shape rectangle"></div>
    </div>
    <a class="QuizCraft" href="index.php" aria-label="Ga naar QuizCraft">
        <h1>QuizCraft</h1>
    </a>
    <div class="container">
        <input type="text" maxlength="6" placeholder="vul je code . . ." class="code-input">
        <button class="join-button">JOIN</button>
    </div>

    <script>
        // Functie om een willekeurige kleur te genereren
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Pas kleuren toe op cirkels en rechthoeken
        const shapes = document.querySelectorAll('.shape');
        shapes.forEach(shape => {
            shape.style.backgroundColor = getRandomColor();
        });
    </script>
</body>
</html>