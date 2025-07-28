<?php
require "../login/Check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
  if(isset($_POST['name'])){
    // $sql = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':joketext', $_POST['joketext']);
    // $stmt->bindValue(':id', $_POST['jokeid']);
    // $stmt->execute();
    updateModule($pdo, $_POST['id'], $_POST['name']);
    header('location: admin_module.php');
  }else{
    //$sql = 'SELECT * FROM joke WHERE id = :id';
    //$stmt = $pdo->prepare($sql);
    //$stmt->bindValue(':id', $_GET['id']);
    //$stmt->execute();
    $module = getModule($pdo, $_GET['id']);
    $title = 'Edit module';

    
    ob_start();
    include '../templates/editmodule.html.php';
    $output = ob_get_clean();
  }
}catch(PDOException $e){
  $title = 'error has occured';
  $output = 'Error editing module: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
