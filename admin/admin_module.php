<?php
require "../login/Check.php";
try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';
  $sql = 'SELECT * FROM module';
  $modules = $pdo->query($sql);
  $title = 'Module List';
  $totalModules = totalModules($pdo);
  

  ob_start();
  include '../templates/admin_module.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
