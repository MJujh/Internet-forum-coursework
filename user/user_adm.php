<?php
require "../login/Check.php";
if (isset($_POST['message'])) {
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
    insertAdminQuestion($pdo, $_POST['message'], $users);
    header('location: user_dm.php');
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include '../includes/DatabaseConnection.php';
  $title = 'Ask our admin a question';

  ob_start();



  $title = 'Ask a question';
  ob_start();
  include '../templates/user_adm.html.php';
  $output = ob_get_clean();
}

include '../templates/user_layout.html.php';
