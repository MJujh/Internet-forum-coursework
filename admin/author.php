<?php
try {
  include 'includes/DatabaseConnection.php';
  include 'includes/DatabaseFunctions.php';

  $sql = 'SELECT * FROM joke
  INNER JOIN author ON authorid = author.id';
  $authors = $pdo->query($sql);
  $title = 'Author List';
  $totalAuthors = totalAuthors($pdo);

  ob_start();
  include 'templates/author.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';

