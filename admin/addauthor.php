<?php
if (isset($_POST['joketext'])) {
  try {
    include 'includes/DatabaseConnection.php';

    $sql = 'INSERT INTO author SET
      name = :name';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->execute();
    header('location: author.php');
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  $title = 'Add a new joke';
  ob_start();
  include 'templates/addauthor.html.php';
  $output = ob_get_clean();
}

include 'templates/layout.html.php';
