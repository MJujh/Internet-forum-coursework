<?php
try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';

  deleteQuestion($pdo, $_POST["id"]);
  header('location: admin_question.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to delete question: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
