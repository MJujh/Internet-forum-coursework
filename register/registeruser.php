<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
  try {
    include '../includes/DatabaseConnection.php';

    $sql = 'INSERT INTO user SET
      name = :name,
      email = :email,
      password = :password';
      
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT)); // Securely hash password
    $stmt->execute();

    header('Location: user_index.php'); // Redirect after successful registration
    exit;
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include '../includes/DatabaseConnection.php';

  $title = 'Register a New User';
  ob_start();
  include '../templates/registeruser.html.php';
  $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';
?>