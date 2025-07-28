<?php
require "../login/Check.php";
try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';

  deleteMessage($pdo, $_POST["id"]);
  header('location: admin_dm.php');
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Unable to connect to delete message: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
