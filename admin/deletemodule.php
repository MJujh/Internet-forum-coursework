<?php
try {
  include '../includes/DatabaseConnection.php';

  $sql = 'DELETE FROM module WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $_POST['id']);
  $stmt->execute();
  header('location: module.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to delete module: ' . $e->getMessage();
}

include '../templates/layout.html.php';
