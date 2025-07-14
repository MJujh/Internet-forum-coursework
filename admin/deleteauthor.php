<?php
try {
  include 'includes/DatabaseConnection.php';

  $sql = 'DELETE FROM author WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $_POST['id']);
  $stmt->execute();
  header('location: author.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to delete joke: ' . $e->getMessage();
}

include 'templates/layout.html.php';
