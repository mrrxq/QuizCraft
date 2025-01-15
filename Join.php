<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vormen zonder Canvas</title>
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
            margin: 0;
            background-color: #FBF5E5;
        }
        body {
            display: flex;
            flex-direction: column;
            position: relative;
        }
        nav {
            background-color: #A35C7A; 
            padding: 20px; 
            text-align: center;
            font-size: 24px;
            color: white; 
            padding: 40px;
            border: 4px solid #212121;
        }
        #shapes {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1; 
            position: relative; 
        }

        
        .shape {
            border: 4px solid #212121;
            position: absolute;
        }
        .circle {
            border-radius: 50%;
        }

      
        #circle { width: 80px; height: 180px; top: 150px; right: 100px; transform: rotate(130deg); }
        #circle1 { width: 80px; height: 480px; top: 250px; left: 350px; transform: rotate(-45deg); }
        #circle2 { width: 80px; height: 803px; top: 150px; left: 1100px; transform: rotate(30deg); }
        #circle3 { width: 80px; height: 180px; top: 550px; left: 800px; transform: rotate(30deg); }
        #circle4 { width: 80px; height: 180px; top: 150px; left: 110px; transform: rotate(30deg); }
        #circle5 { width: 80px; height: 180px; top: 550px; left: 400px; transform: rotate(30deg); }

        
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
            top: 200px; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            border-radius: 20px;
            border: 4px solid #212121;
        }
        .QuizCraft {
            color: white; 
            text-align: center;
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
            width: 250px;                      
            padding: 12px;  
            margin: 20px;                 
            border: 2px solid #A35C7A;         
            border-radius: 10px;               
            font-size: 18px;                
            color: #333;                      
            background-color: #e0dede;         
            transition: border-color 0.3s;     
        }
        .code-input:focus {
            outline: none;                  
            border-color: #4CAF50;            
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        .join-button{
            width: 100px;
            height: 40px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <nav></nav>
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
    <div class="QuizCraft">
        <h1>QuizCraft</h1>
    </div>
    <div class="container">
        <input type="text" maxlength="6" placeholder="vul je code . . ." class="code-input">
        <button class="join-button">JOIN</button>
    </div>

    <script>
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
        const shapes = document.querySelectorAll('.shape');
        shapes.forEach(shape => {
            shape.style.backgroundColor = getRandomColor();
        });
    </script>
</body>
</html>