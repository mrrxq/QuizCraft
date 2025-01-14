<?php
session_start();
require 'config.php';

// Controleer of de gebruiker is ingelogd en een student is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit;
}

// Haal toegewezen quizzen op
$stmt = $pdo->prepare("
    SELECT quizzes.id, quizzes.title, quizzes.description 
    FROM quiz_assignments 
    JOIN quizzes ON quiz_assignments.quiz_id = quizzes.id 
    WHERE quiz_assignments.student_id = ?
");
$stmt->execute([$_SESSION['user_id']]);
$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Volgen</title>
</head>
<body>
    <h1>Beschikbare Quizzen</h1>
    <?php if (!empty($quizzes)): ?>
        <ul>
            <?php foreach ($quizzes as $quiz): ?>
                <li>
                    <h2><?php echo htmlspecialchars($quiz['title']); ?></h2>
                    <p><?php echo htmlspecialchars($quiz['description']); ?></p>
                    <a href="start_quiz.php?quiz_id=<?php echo $quiz['id']; ?>">Start Quiz</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Er zijn geen quizzen aan jou toegewezen.</p>
    <?php endif; ?>
</body>
</html>
