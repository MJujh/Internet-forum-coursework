<?php
include '../includes/DatabaseFunctions.php';
include '../includes/DatabaseConnection.php';

$question = getQuestionById($pdo, $_GET['id'] ?? 0);

// Pass $question to the template
include '../templates/public_question.html.php';
?>