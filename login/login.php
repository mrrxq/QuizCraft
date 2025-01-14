<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard/dashboard.php");
        exit;
    } else {
        echo "Ongeldige gebruikersnaam of wachtwoord.";
    }
}
?>

<h1>Inloggen</h1>
<form method="POST" action="">
    <label>Gebruikersnaam:</label>
    <input type="text" name="username" required>
    <br>
    <label>Wachtwoord:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Inloggen</button>
</form>
