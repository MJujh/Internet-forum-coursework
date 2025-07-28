<?php
require "../login/Check.php";
include 'includes/DatabaseConnection.php';
try{
  if(isset($_POST['name'])){
    $sql = 'UPDATE author SET name = :name WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $_POST['name']);
    $stmt->bindValue(':id', $_POST['authoridid']);
    $stmt->execute();
    header('location: author.php');
  }else{
    $sql = 'SELECT * FROM author WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $joke = $stmt->fetch();
    $title = 'Edit author';

    ob_start();
    include 'templates/editauthor.html.php';
    $output = ob_get_clean();
  }
}catch(PDOException $e){
  $title = 'error has occured';
  $output = 'Error editing author: ' . $e->getMessage();
}

include 'templates/layout.html.php';
