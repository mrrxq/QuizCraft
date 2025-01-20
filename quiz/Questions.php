<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #FBF5E5;
            position: relative;
            overflow: hidden;
        }
        .navbar {
            background-color: #FBF5E5;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 4px solid #212121;
            position: relative;
            z-index: 1;
        }
        .navbar h1{
            display: flex;
            margin-left: 20%;
            color: #212121;
            font-weight: 600;
            font-size: 50px;
        }
        .navbar h3{
            display: flex;
            margin-right: 15%;
        }
        .shape {
            position: absolute;
            transform: rotate(calc(10deg * var(--rotation)));
        }
        .circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .square {
            width: 100px;
            height: 100px;
        }
        .triangle {
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 100px solid;
        }
        .rectangle {
            width: 150px;
            height: 75px;
        }
        .oval {
            width: 150px;
            height: 100px;
            border-radius: 75px;
        }
        .star {
            position: absolute;
            color: gold;
            font-size: 72px;
            transform: rotate(calc(10deg * var(--rotation)));
        }
        .image-container {
            border-radius: 20px;
            width: 900px; 
            height: 300px; 
            background-color: white; 
            border: 4px solid #212121; 
            margin: 15px auto; 
            position: relative; 
            z-index: 2; 
            background-image: url('img/quizcarft.png'); /* Replace with your default image URL */
            background-size: cover; 
            background-position: center; 
        }
        img {
            max-width: 100%;
            max-height: 100%;
            position: absolute; 
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            grid-gap: 20px; 
            margin: 20px auto; 
            width: fit-content; 
            position: relative; 
            z-index: 3; 
        }
        button {
            padding: 25px;
            width: 700px;
            font-size: 20px;
            cursor: pointer;
            border: none;
            color: white; 
            border: 4px solid #212121;
            border-radius: 15px; 
            transition: 0.3s;
        }
        .vraag2 {
            background-color: #C890A7;
        }
        .vraag4 {
            background-color: #A35C7A;
        }
        #timer {
            font-size: 48px;
            color: #333;
            position: absolute; 
            top: 35%; 
            left: 8%; 
            z-index: 4;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #A35C7A;
            display: flex; /* Use flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            border: 3px solid #212121;
            color: white;
        }
        #answers {
            font-size: 48px;
            color: #333;
            position: absolute; 
            top: 35%; 
            right: 8%; 
            z-index: 4;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #A35C7A;
            display: flex; /* Use flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            border: 3px solid #212121;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Question:</h1>
        <h3>Questions left:</h3>
    </div>

    <div class="image-container" id="imageContainer">
        <!-- Image will appear here -->
    </div>
    
    <input type="file" id="fileInput" accept="image/*" style="display: block; margin: 20px auto;"/>

    <div class="button-container">
        <button class="vraag4"><h1>Vraag 1</h1></button>
        <button class="vraag2"><h1>Vraag 2</h1></button>
        <button class="vraag2"><h1>Vraag 3</h1></button>
        <button class="vraag4"><h1>Vraag 4</h1></button>
    </div>

    <div id="timer">20</div> <!-- Timer -->
    <div id="answers">0</div>

<script>
    const shapes = ['circle', 'square', 'triangle', 'rectangle', 'oval'];
    const shapeContainer = document.body;
    const colors = ['#FF6F61', '#32CD32', '#00BFFF', '#9370DB'];

    for (let i = 0; i < 5; i++) {
        shapes.forEach((shape) => {
            const div = document.createElement('div');
            div.className = `shape ${shape}`;
                
            div.style.top = `${Math.random() * (window.innerHeight - 100)}px`;
            div.style.left = `${Math.random() * (window.innerWidth - 100)}px`;
            div.style.setProperty('--rotation', Math.floor(Math.random() * 6)); 

            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            if (shape === 'triangle') {
                div.style.borderBottomColor = randomColor;
            } else {
                div.style.backgroundColor = randomColor;
            }

            shapeContainer.appendChild(div);
        });
    }

    for (let i = 0; i < 6; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.top = `${Math.random() * (window.innerHeight - 100)}px`;
        star.style.left = `${Math.random() * (window.innerWidth - 100)}px`;
        star.style.setProperty('--rotation', Math.floor(Math.random() * 6));
        star.textContent = '★';
        shapeContainer.appendChild(star);
    }

    const fileInput = document.getElementById('fileInput');
    const imageContainer = document.getElementById('imageContainer');

    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            imageContainer.innerHTML = ''; 
            imageContainer.appendChild(img);
        }
    });

    let timeLeft = 20;
    const timerElement = document.getElementById('timer');

    const countdown = setInterval(() => {
        timeLeft--;
        timerElement.textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(countdown);
            alert('Tijd is om!');
        }
    }, 1000);
</script>
</body>
</html>