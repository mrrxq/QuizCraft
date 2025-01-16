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
        }
        .sidebar {
            width: 50px;
            background-color: #A35C7A;
            padding: 10px;
            transition: width 0.3s;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
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
            width: 180px;
            height: 50px;
            background-color: #D9D9D9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            position: absolute; /* Absoluut positioneren */
            top: 20%; /* 50% van de bovenkant van de pagina */
            left: 25%; /* 50% van de linkerkant van de pagina */
            transform: translate(-50%, -50%); /* Centreren vanuit het midden */
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
                    profileBtn.style.transform = 'translateY(0)';
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