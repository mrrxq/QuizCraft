<?php
session_start();
require 'config.php';

$stmt = $pdo->query("
    SELECT scores.id, users.username, quizzes.title, scores.score, scores.correct_answers, scores.incorrect_answers 
    FROM scores
    JOIN users ON scores.user_id = users.id
    JOIN quizzes ON scores.quiz_id = quizzes.id
");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Resultaten Bekijken</h1>
<table border="1">
    <tr>
        <th>Student</th>
        <th>Quiz</th>
        <th>Score</th>
        <th>Correcte Antwoorden</th>
        <th>Foute Antwoorden</th>
    </tr>
    <?php foreach ($results as $result): ?>
        <tr>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $result['title']; ?></td>
            <td><?php echo $result['score']; ?></td>
            <td><?php echo $result['correct_answers']; ?></td>
            <td><?php echo $result['incorrect_answers']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
