<?php

require "../login/Check.php";

try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';

  $sql = 'SELECT question.id, question.title, question.text_content, question.date, question.img_content, user.name, user.email  FROM question
  INNER JOIN user ON user_id = user.id
  INNER JOIN module ON module_id = module.id';
  $questions = $pdo->query($sql);
  $title = 'Question';
  $totalQuestions = totalQuestions($pdo);
  ob_start();
  include '../templates/user_questions.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();
}

include '../templates/user_layout.html.php';

