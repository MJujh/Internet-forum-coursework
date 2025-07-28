<?php
require "../login/Check.php";
include '../includes/DatabaseFunctions.php';
include '../includes/DatabaseConnection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Optionally redirect or show error
    die('Invalid question ID.');
}

$questionId = (int)$_GET['id'];
$question = getQuestionById($pdo, $questionId);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    $userId = $_SESSION['User_id'];
    $text_content = $_POST['comment'];
    $img_content = '';

    if (isset($_FILES['img_content']) && $_FILES['img_content']['error'] === UPLOAD_ERR_OK) {
        $imgName = uniqid() . '_' . basename($_FILES['img_content']['name']); // e.g. 66a1b2c3_pic.jpg
        $targetPath = '../images/' . $imgName;
        move_uploaded_file($_FILES['img_content']['tmp_name'], $targetPath);
        $img_content = $imgName; // Only the filename is saved to DB
    }

    insertComment($pdo, $questionId, $userId, $text_content, $img_content);
    header("Location: user_question.php?id={$questionId}");
    exit;
}

// ...existing code to fetch and display the question and comments...

include '../templates/user_question.html.php';
?>