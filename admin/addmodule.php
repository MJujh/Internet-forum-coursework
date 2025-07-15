<?php
if (isset($_POST['name'])) {
  try {
    include '../includes/DatabaseConnection.php';

    $sql = 'INSERT INTO module SET
      Mname = :name';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->execute();
    header('location: module.php');
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include '../includes/DatabaseConnection.php';
$title = 'Add a new module';
$sql_a = 'SELECT * FROM module';
$modules = $pdo->query($sql_a);
ob_start();
  $title = 'Add a new module';
  ob_start();
  include '../templates/addmodule.html.php';
  $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';
