<?php
include '../includes/DatabaseConnection.php';
try{
  if(isset($_POST['name'])){
    $sql = 'UPDATE user SET name = :name WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':id', $_POST['user_id']);
    $stmt->execute();
    header('location: user.php');
  }else{
    $sql = 'SELECT * FROM user WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $user = $stmt->fetch();
    $title = 'Edit user';

    ob_start();
    include '../templates/edituser.html.php';
    $output = ob_get_clean();
  }
}catch(PDOException $e){
  $title = 'error has occured';
  $output = 'Error editing user: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
