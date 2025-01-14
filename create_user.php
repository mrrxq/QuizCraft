<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] == 'student') {
    header("Location: login.php");
    exit;
}

$role = $_GET['role'];
if (!in_array($role, ['docent', 'student'])) {
    die("Ongeldige rol.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $role]);

    echo ucfirst($role) . " succesvol aangemaakt!";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($role); ?> Aanmaken</title>
</head>
<body>
    <h1><?php echo ucfirst($role); ?> Aanmaken</h1>
    <form method="POST" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Wachtwoord:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Aanmaken</button>
    </form>
</body>
</html>
