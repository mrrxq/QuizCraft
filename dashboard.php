<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';

$userRole = $_SESSION['role'];

if ($userRole == 'admin') {
    echo "<h1>Welkom Admin!</h1>";
    echo "<a href='create_user.php?role=docent'>Docent aanmaken</a>";
} elseif ($userRole == 'docent') {
    echo "<h1>Welkom Docent!</h1>";
    echo "<a href='create_user.php?role=student'>Student aanmaken</a>";
} else {
    echo "<h1>Welkom Student!</h1>";
}
?>

<a href="logout.php">Uitloggen</a>
