<?php
require "../login/Check.php";
try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';

  $sql = 'SELECT * FROM user';
  $users = $pdo->query($sql);
  $title = 'User List';
  $totalUsers = totalUsers($pdo);

  ob_start();
  include '../templates/user.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';

