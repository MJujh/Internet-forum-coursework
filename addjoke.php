<?php
if (isset($_POST['joketext'])) {
  try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';


    // $sql = 'INSERT INTO joke SET
    //   joketext = :joketext,
    //   jokedate = CURDATE(),
    //   authorid=:authorid
    //   categoryid = 3';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':joketext', $_POST['joketext']);
    // $stmt->execute();
    insertJoke($pdo, $_POST['joketext'], $_POST['authors'],$_POST['categories']);
    header('location: jokes.php');
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include 'includes/DatabaseConnection.php';
  $title = 'Add a new joke';
  $sql_a = 'SELECT * FROM author';
  $authors = $pdo->query($sql_a);
  ob_start();

$title = 'Add a new category';
$sql_a = 'SELECT * FROM category';
$categories = $pdo->query($sql_a);
ob_start();



  $title = 'Add a new joke';
  ob_start();
  include 'templates/addjoke.html.php';
  $output = ob_get_clean();
}

include 'templates/layout.html.php';
