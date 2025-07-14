<?php
try {
  include 'includes/DatabaseConnection.php';
  include 'includes/DatabaseFunctions.php';
  $sql = 'SELECT * FROM category';
  $cates = $pdo->query($sql);
  $title = 'Category List';
  $totalCates = totalCates($pdo);
  

  ob_start();
  include 'templates/cate.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';

