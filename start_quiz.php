<?php
session_start();
require 'config.php';

// Controleer of de gebruiker is ingelogd en een student is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit;
}

// Haal de quiz_id op uit de URL
$quiz_id = $_GET['quiz_id'] ?? null;

if (!$quiz_id) {
    echo "<p style='color: red;'>Geen quiz geselecteerd.</p>";
    exit;
}

// Haal de quiz en bijbehorende vragen op
$stmt = $pdo->prepare("
    SELECT quizzes.title, questions.id AS question_id, questions.question_text 
    FROM quizzes
    JOIN questions ON quizzes.id = questions.quiz_id
    WHERE quizzes.id = ?
");
$stmt->execute([$quiz_id]);
$quiz_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($quiz_data)) {
    echo "<p style='color: red;'>Quiz niet gevonden of bevat geen vragen.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Starten</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($quiz_data[0]['title']); ?></h1>

    <form method="POST" action="submit_quiz.php">
        <?php foreach ($quiz_data as $question): ?>
            <h3><?php echo htmlspecialchars($question['question_text']); ?></h3>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM answers WHERE question_id = ?");
            $stmt->execute([$question['question_id']]);
            $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($answers as $answer): ?>
                <label>
                    <input type="radio" name="answers[<?php echo $question['question_id']; ?>]" value="<?php echo $answer['id']; ?>" required>
                    <?php echo htmlspecialchars($answer['answer_text']); ?>
                </label><br>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <button type="submit">Quiz Indienen</button>
    </form>
</body>
</html>
