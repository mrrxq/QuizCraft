<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizCraft</title>
    <style type="text/css">
        * {
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #FBF5E5; 
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
            overflow-x: hidden;
        }
        .navbar {
            background: #C890A7; 
            font-family: 'Inter', sans-serif; 
            padding: 15px 30px;
            border: 4px solid #212121;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; 
            position: relative; 
        }
        .logo {
            background-color: #A35C7A;
            padding: 10px 20px; 
            border-radius: 10px; 
            margin-right: 170px;
        }
        .logo a {
            font-size: 40px; 
            font-weight: 600; 
            color: white;
        }
        ul {
            display: flex; 
            align-items: center;
        }
        li {
            list-style: none; 
            display: inline-block;
        }
        li a {
            color: white; 
            font-size: 20px; 
            font-weight: bold; 
            margin-right: 65px;
            padding-left: 65px;
        }
        .button-container {
            display: flex; 
            align-items: center; 
        }
        .login-link {
            color: #212121;
            background-color: #212121;
            margin-left: 45px; 
            margin-right: 45px;
            border-radius: 10px; 
            padding: 10px; 
            width: 90px;
            text-align: center;
            display: inline-block;
            color: white; 
            font-weight: bold;
            font-size: 15px;
            display: block;
        }
        .textBox {
            background-color: #C890A7;
            border: 4px solid #212121;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 600px;
            margin: 40px auto; 
        }
        h1 {
            text-align: center;
            margin-top: 20px; 
            font-family: 'Inter', sans-serif;
            font-size: 60px;
            font-weight: 700;
        }
        .quiz-container {
            display: flex; 
            justify-content: center; 
            margin-top: 20px; 
        }
        .quizblok {
            margin: 10px; 
            width: 250px; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            background-color: #A35C7A; 
            border: none; 
            border-radius: 10px; 
            color: white; 
            border: 4px solid #212121;
            padding: 10px; 
            cursor: pointer; 
        }
        .quizblok img {
            width: 100%; 
            height: auto; 
            border-radius: 10px; 
        }
        .quizText {
            margin-top: 10px; 
            font-size: 18px; 
            color: #212121; 
            text-align: center; 
        }
        footer {
            background-color: #111;
            padding: 20px 0; 
            margin-top: auto; 
            width: 100%; 
        }
        .footerContainer {
            width: 100%;
            padding: 20px 30px;
            text-align: center; 
        }
        .footerNav {
            margin: 30px 0;
        }
        .footerNav ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
        }
        .footerNav ul li a {
            color:white;
            margin: 20px;
            text-decoration: none;
            font-size: 1.3em;
            opacity: 0.7;
            transition: 0.5s;
        }
        .footerNav ul li a:hover {
            opacity: 1;
        }
        .footerBottom {
            padding: 20px;
            text-align: center;
        }
        .footerBottom p {
            color: white;
        }
        .designer {
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 400;
            margin: 0px 5px;
        }
        .quizText {
            font-size: 40px;
            font-weight: 600;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="Join.php">Join</a></li>
            <li><a href="Create.php">Create</a></li>
        </ul>
        <div class="logo"><a href="#">Quiz Craft</a></div>
        <div class="button-container">
            <button class="login-link" onclick="window.location.href='Login.php';">Log In</button>
        </div>
    </nav>
    <h1>
        Welcome to<br>QuizCraft!
    </h1>
    <div class="textBox">
        Unlock your knowledge and challenge yourself with our fun and engaging quizzes!<br> 
        Whether you're a trivia master or just looking to learn something new, <br>
        we have a wide range of topics to explore.
    </div>
    <div class="quiz-container">
        <button class="quizblok" onclick="location.href='#';"> <!-- Link to Quiz 1 -->
            <img src="img/Coding-for-Beginners---How-to-Get-Started-With-Coding.png" alt="Quiz 1"> <!-- Replace with actual image URL -->
            <div class="quizText">Coderen</div>
        </button>
        <button class="quizblok" onclick="location.href='#';"> <!-- Link to Quiz 2 -->
            <img src="img/and-more.jpg" alt="Quiz 2"> <!-- Replace with actual image URL -->
            <div class="quizText">Math</div>
        </button>
        <button class="quizblok" onclick="location.href='#';"> <!-- Link to Quiz 3 -->
            <img src="img/kahoot.jpg" alt="Quiz 3"> <!-- Replace with actual image URL -->
            <div class="quizText">Kahoot</div>
        </button>
        <button class="quizblok" onclick="location.href='#';"> <!-- Link to Quiz 4 -->
            <img src="img/a362273509f7eccdcf362bb73b3b006d.avif" alt="Quiz 4"> <!-- Replace with actual image URL -->
            <div class="quizText">Music</div>
        </button>
    </div>

    <footer>
        <div class="footerContainer">
            <div class="footerNav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Our Team</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2025; Designed by <span class="designer">QuizCraft</span></p>
        </div>
    </footer>
</body>
</html>