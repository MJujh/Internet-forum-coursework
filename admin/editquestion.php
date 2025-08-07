<?php
require "../login/Check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try{
  if(isset($_POST['text_content'])){
    // Handle image removal if requested
    if (isset($_POST['remove_image']) && $_POST['remove_image'] == '1') {
      $question = getQuestionById($pdo, $_POST['id']);
      if (!empty($question['img_content'])) {
        $imgPath = '../images/' . $question['img_content'];
        if (file_exists($imgPath)) {
          unlink($imgPath);
        }
        // Set img_content to empty in DB
        $stmt = $pdo->prepare('UPDATE question SET img_content = NULL WHERE id = :id');
        $stmt->execute(['id' => $_POST['id']]);
      }
    }
        if (isset($_FILES['img_content']) && $_FILES['img_content']['error'] === UPLOAD_ERR_OK) {
        $imgName = uniqid() . '_' . basename($_FILES['img_content']['name']);
        $targetPath = '../images/' . $imgName;
        move_uploaded_file($_FILES['img_content']['tmp_name'], $targetPath);
        $img_content = $imgName;
    }

    updateQuestion($pdo, $_POST['id'], $_POST['text_content'], $img_content ?? null);
    header('location: admin_questions.php');
  }else{
    //$sql = 'SELECT * FROM joke WHERE id = :id';
    //$stmt = $pdo->prepare($sql);
    //$stmt->bindValue(':id', $_GET['id']);
    //$stmt->execute();
    $question = getQuestionById($pdo, $_GET['id']);
    $title = 'Edit question';
    $sql_a = 'SELECT * FROM module';
    $modules = $pdo->query($sql_a);
    $sql_b = 'SELECT * FROM user';
    $users = $pdo->query($sql_b);

    ob_start();
    include '../templates/editquestion.html.php';
    $output = ob_get_clean();
  }
}catch(PDOException $e){
  $title = 'error has occured';
  $output = 'Error editing joke: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
