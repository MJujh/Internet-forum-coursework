<?php
session_start();
if (isset($_POST['text_content'])) {
  try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $users = $_SESSION["User_id"];
    $img_content = '';

    if (isset($_FILES['img_content']) && $_FILES['img_content']['error'] === UPLOAD_ERR_OK) {
        $imgName = uniqid() . '_' . basename($_FILES['img_content']['name']);
        $targetPath = '../images/' . $imgName;
        move_uploaded_file($_FILES['img_content']['tmp_name'], $targetPath);
        $img_content = $imgName;
    }

    insertQuestion($pdo, $_POST['text_content'], $img_content, $users, $_POST['modules']);
    $newId = $pdo->lastInsertId();
    header('location: admin_question.php?id=' . $newId);
    exit;
  } catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
  }
} else {
  include '../includes/DatabaseConnection.php';
  $title = 'Ask a question';

  $sql_a = 'SELECT * FROM module';
  $modules = $pdo->query($sql_a);

  $title = 'Ask a question';
  ob_start();
  include '../templates/addquestion.html.php';
  $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';
