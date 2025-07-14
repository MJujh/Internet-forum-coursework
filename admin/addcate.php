<?php
if (isset($_POST['name'])) {
  try {
    include 'includes/DatabaseConnection.php';

    $sql = 'INSERT INTO category SET
      name = :name';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->execute();
    header('location: cate.php');
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include 'includes/DatabaseConnection.php';
$title = 'Add a new category';
$sql_a = 'SELECT * FROM category';
$authors = $pdo->query($sql_a);
ob_start();
  $title = 'Add a new category';
  ob_start();
  include 'templates/addcate.html.php';
  $output = ob_get_clean();
}

include 'templates/layout.html.php';
