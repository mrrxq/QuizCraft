<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizCraft Resultaat</title>
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #fef6e4;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #A35C7A;
            margin-bottom: 30px;
            font-size: 48px;
            text-decoration: none; /* Zorgt ervoor dat er geen onderlijn is */
        }
        a {
            text-decoration: none; /* Verwijdert de onderlijn van de link */
        }
        .percentage-circle {
            background-color: #d8a7b4;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            border: 4px solid #212121;
        }
        .result-box {
            background-color: #d8a7b4;
            width: 250px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            border: 4px solid #212121;
        }
        .percentage-text {
            font-size: 64px;
            font-weight: bold;
            color: #ffffff;
        }
        .result-text {
            font-size: 24px;
            color: #ffffff;
        }
        p {
            font-size: 22px;
            color: #A35C7A;
            margin-top: 20px;
            text-align: center; /* Centraal uitlijnen */
        }
        .button-container {
            display: flex;
            flex-direction: row; /* Horizontale weergave */
            justify-content: center; /* Centreren van knoppen */
            margin-top: 20px; /* Ruimte boven de knoppen */
        }
        button {
            padding: 12px 24px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            border: 4px solid #212121;
            margin: 0 10px; /* Ruimte tussen knoppen */
        }
        #Retry {
            background-color: #4CAF50; /* Mooie groene kleur */
        }
        button:not(#Retry) {
            background-color: #A35C7A; /* Kleur voor andere knoppen */
        }
    </style>
</head>
<body>
    <a href="index.php"><h1>QuizCraft</h1></a>
    <div class="percentage-circle">
        <span class="percentage-text">60%</span>
    </div>
    <div class="result-box">
        <p class="result-text">Je resultaat!</p>
    </div>
    <p>Goed gedaan! Probeer het opnieuw voor een hogere score.</p>
    <div class="button-container">
        <button onclick="location.href='andere_resultaten.php'">Andere resultaten</button>
        <button id="Retry" onclick="location.href='index.php'">Opnieuw proberen</button>
        <button onclick="location.href='andere_quizzes.php'">Andere Quizzes</button>
    </div>
</body>
</html>