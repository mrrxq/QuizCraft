<?php
session_start();
require 'config.php';

// Controleer of de gebruiker is ingelogd en een docent is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'docent') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question_id = $_POST['question_id'];
    $question_text = $_POST['question_text'] ?? null;
    $correct_answer = $_POST['correct_answer'] ?? null;

    if (!empty($question_id) && !empty($question_text) && !empty($correct_answer)) {
        try {
            $stmt = $pdo->prepare("UPDATE questions SET question_text = ?, correct_answer = ? WHERE id = ?");
            $stmt->execute([$question_text, $correct_answer, $question_id]);
            echo "<p style='color: green;'>Vraag succesvol bijgewerkt!</p>";
            header("Location: manage_questions.php");
            exit;
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Er is een fout opgetreden: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Alle velden zijn verplicht.</p>";
    }
}

// Haal de vraag op die bewerkt moet worden
$question_id = $_GET['question_id'] ?? null;
if ($question_id) {
    $stmt = $pdo->prepare("SELECT * FROM questions WHERE id = ?");
    $stmt->execute([$question_id]);
    $question = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$question) {
        echo "<p style='color: red;'>Vraag niet gevonden.</p>";
        exit;
    }
} else {
    echo "<p style='color: red;'>Geen vraag geselecteerd.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vraag Bewerken</title>
</head>
<body>
    <h1>Vraag Bewerken</h1>
    <form method="POST" action="">
        <label>Vraagtekst:</label>
        <textarea name="question_text" required><?php echo htmlspecialchars($question['question_text']); ?></textarea>
        <br>
        <label>Correct Antwoord:</label>
        <input type="text" name="correct_answer" value="<?php echo htmlspecialchars($question['correct_answer']); ?>" required>
        <br>
        <input type="hidden" name="question_id" value="<?php echo htmlspecialchars($question['id']); ?>">
        <button type="submit">Vraag Bijwerken</button>
    </form>
</body>
</html>
