<?php

require "../login/Check.php";

try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';

  $selectedModule = isset($_GET['module']) ? $_GET['module'] : '';
  $modules = $pdo->query('SELECT id, Mname FROM module')->fetchAll();

  if ($selectedModule) {
      $stmt = $pdo->prepare('SELECT question.id, question.title, question.text_content, question.date, question.img_content, user.name, user.email, module.Mname
          FROM question
          INNER JOIN user ON question.user_id = user.id
          INNER JOIN module ON question.module_id = module.id
          WHERE module.id = :module_id');
      $stmt->execute([':module_id' => $selectedModule]);
      $questions = $stmt->fetchAll();
  } else {
      $stmt = $pdo->query('SELECT question.id, question.title, question.text_content, question.date, question.img_content, user.name, user.email, module.Mname
          FROM question
          INNER JOIN user ON question.user_id = user.id
          INNER JOIN module ON question.module_id = module.id');
      $questions = $stmt->fetchAll();
  }
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

