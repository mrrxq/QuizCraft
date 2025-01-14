<?php
session_start();
require 'config.php';

// Controleer of de gebruiker is ingelogd en een student is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit;
}

// Controleer of er antwoorden zijn ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answers'])) {
    $answers = $_POST['answers'];
    $student_id = $_SESSION['user_id'];
    $score = 0;

    foreach ($answers as $question_id => $answer_id) {
        // Controleer of het antwoord correct is
        $stmt = $pdo->prepare("SELECT is_correct FROM answers WHERE id = ? AND question_id = ?");
        $stmt->execute([$answer_id, $question_id]);
        $answer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($answer && $answer['is_correct']) {
            $score++;
        }
    }

    // Sla het resultaat op in de database
    $stmt = $pdo->prepare("INSERT INTO scores (student_id, score, submitted_at) VALUES (?, ?, NOW())");
    $stmt->execute([$student_id, $score]);

    echo "<p style='color: green;'>Quiz voltooid! Je score is: $score.</p>";
    echo "<a href='dashboard.php'>Terug naar dashboard</a>";
} else {
    echo "<p style='color: red;'>Geen antwoorden ontvangen.</p>";
}
?>
