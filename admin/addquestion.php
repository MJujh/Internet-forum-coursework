<?php
session_start();
if (isset($_POST['text_content'])) {
  try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';


    // $sql = 'INSERT INTO joke SET
    //   joketext = :joketext,
    //   jokedate = CURDATE(),
    //   authorid=:authorid
    //   categoryid = 3';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':joketext', $_POST['joketext']);
    // $stmt->execute();
      $users = $_SESSION["User_id"];
    insertQuestion($pdo, $_POST['text_content'], $users,$_POST['modules']);
    header('location: admin_question.php');
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include '../includes/DatabaseConnection.php';
  $title = 'Ask a question';

  ob_start();

$title = 'Add a new module';
$sql_a = 'SELECT * FROM module';
$modules = $pdo->query($sql_a);
ob_start();



  $title = 'Ask a question';
  ob_start();
  include '../templates/addquestion.html.php';
  $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';
