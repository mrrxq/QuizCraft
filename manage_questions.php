<?php
session_start();
require 'config.php';

// Controleer of de gebruiker is ingelogd en een docent is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'docent') {
    header("Location: login.php");
    exit;
}

// Voeg een nieuwe quiz toe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_quiz') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_by = $_SESSION['user_id'];

    if (!empty($title) && !empty($description)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO quizzes (title, description, created_by) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $created_by]);
            echo "<p style='color: green;'>Quiz succesvol aangemaakt!</p>";
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Er is een fout opgetreden bij het aanmaken van de quiz: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Alle velden zijn verplicht.</p>";
    }
}

// Voeg een nieuwe vraag toe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_question') {
    $quiz_id = $_POST['quiz_id'];
    $question_text = $_POST['question_text'];

    if (!empty($quiz_id) && !empty($question_text)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO questions (quiz_id, question_text) VALUES (?, ?)");
            $stmt->execute([$quiz_id, $question_text]);
            echo "<p style='color: green;'>Vraag succesvol toegevoegd!</p>";
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Er is een fout opgetreden bij het toevoegen van de vraag: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Alle velden zijn verplicht.</p>";
    }
}

// Voeg een antwoord toe aan een vraag
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_answer') {
    $question_id = $_POST['question_id'];
    $answer_text = $_POST['answer_text'];
    $is_correct = isset($_POST['is_correct']) ? 1 : 0;

    if (!empty($question_id) && !empty($answer_text)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO answers (question_id, answer_text, is_correct) VALUES (?, ?, ?)");
            $stmt->execute([$question_id, $answer_text, $is_correct]);
            echo "<p style='color: green;'>Antwoord succesvol toegevoegd!</p>";
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Er is een fout opgetreden bij het toevoegen van het antwoord: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Alle velden zijn verplicht.</p>";
    }
}

// Wijs een quiz toe aan een student
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'assign_quiz') {
    $quiz_id = $_POST['quiz_id'];
    $student_id = $_POST['student_id'];

    if (!empty($quiz_id) && !empty($student_id)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO quiz_assignments (quiz_id, student_id) VALUES (?, ?)");
            $stmt->execute([$quiz_id, $student_id]);
            echo "<p style='color: green;'>Quiz succesvol toegewezen!</p>";
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Er is een fout opgetreden bij het toewijzen van de quiz: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color: red;'>Alle velden zijn verplicht.</p>";
    }
}

// Haal alle quizzen op die de docent heeft aangemaakt
$stmt = $pdo->prepare("SELECT * FROM quizzes WHERE created_by = ?");
$stmt->execute([$_SESSION['user_id']]);
$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Haal alle vragen op die bij de quizzen van de docent horen
$stmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id IN (SELECT id FROM quizzes WHERE created_by = ?)");
$stmt->execute([$_SESSION['user_id']]);
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Haal alle studenten op
$stmt = $pdo->query("SELECT id, username FROM users WHERE role = 'student'");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer Quizzen en Vragen</title>
</head>
<body>
    <h1>Beheer Quizzen en Vragen</h1>

    <h2>Nieuwe Quiz Aanmaken</h2>
    <form method="POST" action="">
        <label>Titel:</label>
        <input type="text" name="title" required>
        <br>
        <label>Beschrijving:</label>
        <textarea name="description" required></textarea>
        <br>
        <input type="hidden" name="action" value="add_quiz">
        <button type="submit">Quiz Aanmaken</button>
    </form>

    <h2>Nieuwe Vraag Toevoegen</h2>
    <form method="POST" action="">
        <label>Quiz:</label>
        <select name="quiz_id" required>
            <option value="" disabled selected>Selecteer een quiz</option>
            <?php foreach ($quizzes as $quiz): ?>
                <option value="<?php echo htmlspecialchars($quiz['id']); ?>">
                    <?php echo htmlspecialchars($quiz['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Vraagtekst:</label>
        <textarea name="question_text" required></textarea>
        <br>
        <input type="hidden" name="action" value="add_question">
        <button type="submit">Vraag Toevoegen</button>
    </form>

    <h2>Nieuw Antwoord Toevoegen</h2>
    <form method="POST" action="">
        <label>Vraag:</label>
        <select name="question_id" required>
            <option value="" disabled selected>Selecteer een vraag</option>
            <?php foreach ($questions as $question): ?>
                <option value="<?php echo htmlspecialchars($question['id']); ?>">
                    <?php echo htmlspecialchars($question['question_text']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Antwoordtekst:</label>
        <input type="text" name="answer_text" required>
        <br>
        <label>Is dit het correcte antwoord?</label>
        <input type="checkbox" name="is_correct" value="1">
        <br>
        <input type="hidden" name="action" value="add_answer">
        <button type="submit">Antwoord Toevoegen</button>
    </form>

    <h2>Quiz Toewijzen aan Student</h2>
    <form method="POST" action="">
        <label>Quiz:</label>
        <select name="quiz_id" required>
            <option value="" disabled selected>Selecteer een quiz</option>
            <?php foreach ($quizzes as $quiz): ?>
                <option value="<?php echo htmlspecialchars($quiz['id']); ?>">
                    <?php echo htmlspecialchars($quiz['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Student:</label>
        <select name="student_id" required>
            <option value="" disabled selected>Selecteer een student</option>
            <?php foreach ($students as $student): ?>
                <option value="<?php echo htmlspecialchars($student['id']); ?>">
                    <?php echo htmlspecialchars($student['username']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <input type="hidden" name="action" value="assign_quiz">
        <button type="submit">Quiz Toewijzen</button>
    </form>
</body>
</html>