<?php
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
  if(isset($_POST['text_content'])){
    // $sql = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':joketext', $_POST['joketext']);
    // $stmt->bindValue(':id', $_POST['jokeid']);
    // $stmt->execute();
    updateQuestion($pdo, $_POST['id'], $_POST['text_content']);
    header('location: admin_question.php');
  }else{
    //$sql = 'SELECT * FROM joke WHERE id = :id';
    //$stmt = $pdo->prepare($sql);
    //$stmt->bindValue(':id', $_GET['id']);
    //$stmt->execute();
    $question = getQuestion($pdo, $_GET['id']);
    $title = 'Edit question';

    ob_start();
    include '../templates/editquestion.html.php';
    $output = ob_get_clean();
  }
}catch(PDOException $e){
  $title = 'error has occured';
  $output = 'Error editing joke: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
