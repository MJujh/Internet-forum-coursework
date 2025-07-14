<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';
try{
  if(isset($_POST['joketext'])){
    // $sql = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':joketext', $_POST['joketext']);
    // $stmt->bindValue(':id', $_POST['jokeid']);
    // $stmt->execute();
    updateJoke($pdo, $_POST['jokeid'], $_POST['joketext']);
    header('location: jokes.php');
  }else{
    //$sql = 'SELECT * FROM joke WHERE id = :id';
    //$stmt = $pdo->prepare($sql);
    //$stmt->bindValue(':id', $_GET['id']);
    //$stmt->execute();
    $joke = getJoke($pdo, $_GET['id']);
    $title = 'Edit joke';

    ob_start();
    include 'templates/editjoke.html.php';
    $output = ob_get_clean();
  }
}catch(PDOException $e){
  $title = 'error has occured';
  $output = 'Error editing joke: ' . $e->getMessage();
}

include 'templates/layout.html.php';
