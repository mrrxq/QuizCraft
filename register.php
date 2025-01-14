<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $role]);

    echo "Gebruiker succesvol aangemaakt!";
}
?>

<h1>Gebruiker Registreren</h1>
<form method="POST" action="">
    <label>Gebruikersnaam:</label>
    <input type="text" name="username" required>
    <br>
    <label>Wachtwoord:</label>
    <input type="password" name="password" required>
    <br>
    <label>Rol:</label>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="docent">Docent</option>
        <option value="student">Student</option>
    </select>
    <br>
    <button type="submit">Gebruiker Aanmaken</button>
</form>
