<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column; 
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background-color: #FBF5E5;
        }
        .main {
            width: 350px;
            height: 500px;
            background: #C890A7;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
            border: 4px solid #212121;
        }
        #chk {
            display: none;
        }
        .signup {
            position: relative;
            width: 100%;
            height: 100%;
        }
        label {
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }
        input {
            width: 60%;
            height: 10px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 12px;
            border: none;
            outline: none;
            border-radius: 5px;
        }
        .loginbtn {
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #4CAF50;
            font-size: 1em;
            font-weight: bold;
            margin-top: 30px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        .loginbtn:hover {
            background: #66BB6A;
        }
        .login {
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }
        .login label {
            color: #573b8a;
            transform: scale(.6);
        }
        #chk:checked ~ .login {
            transform: translateY(-500px);
        }
        #chk:checked ~ .login label {
            transform: scale(1);	
        }
        #chk:checked ~ .signup label {
            transform: scale(.6);
        }
        .QuizCraft {
            background-color: #A35C7A;
            padding: 10px 15px; /* Vergrote padding voor een grotere knop */
            border-radius: 10px; 
            width: 160px; /* Vergrote breedte */
            border: 4px solid #212121;
            margin-bottom: 20px; 
            cursor: pointer; /* Cursor verandert naar pointer */
            display: flex; /* Flexbox voor centreren */
            justify-content: center; /* Horizontaal centreren */
            align-items: center; /* Verticaal centreren */
            font-size: 26px; /* Vergrote font-grootte */
        }
        .QuizCraft h1 {
            font-size: 24px; 
            font-weight: 600; 
            color: white;
            text-align: center; 
            margin: 0; /* Verwijder standaard marge */
        }
    </style>
</head>
<body>
    <button class="QuizCraft" onclick="window.location.href='index.php';">
        <h1>Quiz Craft</h1>
    </button>
    <div class="main">  	
        <input type="checkbox" id="chk" aria-hidden="true" checked>
        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button class="loginbtn">Sign up</button>
            </form>
        </div>
        <div class="login">
            <form>
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button class="loginbtn">Login</button>
            </form>
        </div>
    </div>
    <script>
        // Zorg ervoor dat de loginsectie standaard zichtbaar is
        document.getElementById('chk').checked = true; 
    </script>
</body>
</html>