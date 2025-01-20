<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Voorbeeld met Zijpaneel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f9f3e8;
            position: relative; /* Om de wrapper goed te positioneren */
        }
        .sidebar {
            width: 50px;
            background-color: #A35C7A;
            padding: 10px;
            transition: width 0.3s;
            height: 100vh;
            position: fixed; /* Sidebar blijft vast */
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1; /* Zorgt ervoor dat de sidebar boven andere elementen komt */
        }
        .sidebar.expanded {
            width: 200px;
        }
        .button {
            background-color: #d1a6b0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px 0;
            padding: 10px;
            width: 100%;
            text-align: center;
        }
        .profile-button {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
        }
        .back-arrow {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
            font-size: 24px;
        }
        
        #Create {
            border: 4px solid #212121;
            width: 180px;
            height: 50px;
            background-color: #D9D9D9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            position: absolute;
            top: 20%;
            left: 25%; /* Centraal op de pagina */
            transform: translate(-50%, -50%);
            z-index: 0; /* Zorgt ervoor dat deze onder de sidebar staat */
        }
        .wrapper {
            border-radius: 20px;
            align-items: center;
            max-height: 200px; /* Hoogte van de wrapper */
            border: 1px solid #ddd;
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            margin-left: 290px; /* Deze regel past de positie aan */
            margin-top: 230px; /* Zorg ervoor dat de wrapper naar beneden verschuift */
            height: auto; /* Zorg ervoor dat de hoogte automatisch is */
            background-color: #C890A7;
        }
        .wrapper::-webkit-scrollbar {
            height: 8px;
        }
        .wrapper::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        .wrapper .item {
            border: 4px solid #212121;
            border-radius: 20px;
            min-width: 160px;
            height: 160px;
            line-height: 160px;
            text-align: center;
            background-color: #ddd;
            margin-right: 2px;
            cursor: pointer; /* Zorgt ervoor dat de knoppen eruitzien als knoppen */
        }
        #Saved {
            border: 4px solid #212121;
            width: 180px;
            height: 50px;
            background-color: #D9D9D9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            position: absolute;
            top: 68%;
            left: 25%; /* Centraal op de pagina */
            transform: translate(-50%, -50%);
            z-index: 0; /* Zorgt ervoor dat deze onder de sidebar staat */
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="button" id="toggle-btn" onclick="toggleSidebar()">▶</button>
        <button class="button profile-button" id="profile-btn" onclick="window.location.href='profiel.php';">P</button>
        <span class="back-arrow" id="back-arrow" onclick="window.location.href='index.php';">←</span>
    </div>

    <div id="Create">
        <h1>Create</h1>
    </div>
    <div class="content"></div>

    <div class="wrapper">
        <button class="item" onclick="alert('Kill yourself Nigger')">box-1</button>
        <button class="item" onclick="location.href='Questions.php'">box-2</button>
        <button class="item" onclick="alert('Box 3 clicked!')">box-3</button>
        <button class="item" onclick="alert('Box 4 clicked!')">box-4</button>
        <button class="item" onclick="alert('Box 5 clicked!')">box-5</button>
        <button class="item" onclick="alert('Box 6 clicked!')">box-6</button>
        <button class="item" onclick="alert('Box 7 clicked!')">box-7</button>
        <button class="item" onclick="alert('Box 8 clicked!')">box-8</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-9</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-10</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-11</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-12</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-13</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-14</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-15</button>
        <button class="item" onclick="alert('Box 9 clicked!')">box-16</button>
    </div>

    <div id="Saved">
        <h1>Saved</h1>
    </div>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggle-btn');
            const profileBtn = document.getElementById('profile-btn');
            const backArrow = document.getElementById('back-arrow');

            sidebar.classList.toggle('expanded');

            if (sidebar.classList.contains('expanded')) {
                toggleBtn.innerHTML = '◀';
                profileBtn.style.display = 'block';
                backArrow.style.display = 'block';
                setTimeout(() => {
                    profileBtn.style.opacity = '1';
                    backArrow.style.opacity = '1';
                }, 10);
            } else {
                toggleBtn.innerHTML = '▶';
                profileBtn.style.opacity = '0';
                backArrow.style.opacity = '0';
                profileBtn.style.transform = 'translateY(-10px)';
                backArrow.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    profileBtn.style.display = 'none';
                    backArrow.style.display = 'none';
                }, 300);
            }
        }
    </script>
</body>
</html>