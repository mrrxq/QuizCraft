<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Controleer of de gebruikersnaam al bestaat
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        echo "Gebruikersnaam bestaat al!";
    } else {
        // Voeg de nieuwe gebruiker toe
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $role]);
        echo "Gebruiker succesvol aangemaakt!";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
</head>
<body>
    <h1>Registreren</h1>
    <form method="POST" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="role">Rol:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="docent">Docent</option>
            <option value="student">Student</option>
        </select>
        <br>
        <button type="submit">Account aanmaken</button>
    </form>
</body>
</html>
