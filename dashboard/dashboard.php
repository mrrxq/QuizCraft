<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "<h1>Welkom, " . $_SESSION['role'] . "!</h1>";

if ($_SESSION['role'] === 'admin') {
    echo "<a href='register.php'>Gebruiker Aanmaken</a><br>";
    echo "<a href='manage_quizzes.php'>Quizzen Beheren</a><br>";
} elseif ($_SESSION['role'] === 'docent') {
    echo "<a href='manage_questions.php'>Vragen Beheren</a><br>";
    echo "<a href='view_results.php'>Resultaten Bekijken</a><br>";
} elseif ($_SESSION['role'] === 'student') {
    echo "<a href='take_quiz.php'>Quiz Maken</a><br>";
}

echo "<a href='logout.php'>Uitloggen</a>";
?>
