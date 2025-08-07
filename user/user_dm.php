<?php
require "../login/Check.php";


try {
  include '../includes/DatabaseConnection.php';
  include '../includes/DatabaseFunctions.php';

  $userId = $_SESSION['User_id'];

  $sql = 'SELECT admin_message.id, admin_message.message, admin_message.date, user.name  FROM admin_message INNER JOIN user ON admin_message.user_id = user.id WHERE admin_message.user_id = :userId ORDER BY admin_message.date DESC';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['userId' => $userId]);
  $messages = $stmt->fetchAll();
  $title = 'Messages';
  $totalMessages = totalMessages($pdo);
  ob_start();
  include '../templates/user_dm.html.php';
  $output = ob_get_clean();
} catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();
}

include '../templates/user_layout.html.php';

