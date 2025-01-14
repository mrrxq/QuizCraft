<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_by = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO quizzes (title, description, created_by) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $created_by]);

    echo "Quiz succesvol aangemaakt!";
}

$stmt = $pdo->query("SELECT * FROM quizzes");
$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Quizzen Beheren</h1>
<form method="POST" action="">
    <label>Titel:</label>
    <input type="text" name="title" required>
    <br>
    <label>Beschrijving:</label>
    <textarea name="description" required></textarea>
    <br>
    <button type="submit">Quiz Aanmaken</button>
</form>

<h2>Bestaande Quizzen</h2>
<ul>
    <?php foreach ($quizzes as $quiz): ?>
        <li><?php echo $quiz['title']; ?></li>
    <?php endforeach; ?>
</ul>
