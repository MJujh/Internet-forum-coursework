<?php
function totalQuestions($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function totalMessages($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM admin_message');
    $row = $query->fetch();
    return $row[0];
}

function totalUsers($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM user');
    $row = $query->fetch();
    return $row[0];
}

function totalModules($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM module');
    $row = $query->fetch();
    return $row[0];
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getQuestionById($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT *
FROM question
INNER JOIN user ON question.user_id = user.id
INNER JOIN module ON question.module_id = module.id
WHERE question.id = :id', $parameters);
    return $query->fetch();
}

function getQuestions($pdo){
    $query = query($pdo, 'SELECT question.id, question.title, question.text_content, question.date, question.img_content, user.name, user.email FROM question
    INNER JOIN user ON question.user_id = user.id
    INNER JOIN module ON question.module_id = module.id');
    return $query->fetch();
}

function updateQuestion($pdo,$id,$text_content){
    $query = 'UPDATE question SET text_content = :text_content WHERE id = :id';
    $parameters = [':text_content' => $text_content, ':id' => $id];
    query($pdo, $query, parameters: $parameters);
}

function insertQuestion($pdo, $text_content, $img_content, $userid, $moduleid){
    $query = 'INSERT INTO question(text_content, date, img_content, user_id, module_id)
    VALUES (:text_content, CURDATE(), :img_content, :user_id, :module_id)';
    $parameters =[':text_content' => $text_content, ':img_content' => $img_content, ':user_id' => $userid, ':module_id' => $moduleid];
    query($pdo, $query, $parameters);
}

function deleteQuestion($pdo, $id){
    $sql = 'DELETE FROM question WHERE id = :id';
  $parameters = [':id' => $_POST["id"]];
  query($pdo, $sql, $parameters);
}

function validateEmailAndPassword($pdo, $email, $password){
    $sql = 'SELECT COUNT(*) FROM user
            WHERE email = :email AND `password` = :password';
    $parameters = [':email' => $_POST["email"], ':password' => $_POST["password"]];
    $query = query($pdo,$sql,$parameters);
    $check = $query->fetch();
    return $check[0];
}

function getUserId($pdo, $email, $password){
    $sql = 'SELECT id FROM user
            WHERE email = :email AND `password` = :password';
    $parameters = [':email' => $_POST["email"], ':password' => $_POST["password"]];
    $query = query($pdo,$sql,$parameters);
    $user = $query->fetch();
    return $user ? $user['id'] : null;
}
function getUserRole($pdo, $email, $password){
    $sql = 'SELECT role FROM user
            WHERE email = :email AND `password` = :password';
    $parameters = [':email' => $email, ':password' => $password];
    $query = query($pdo,$sql,$parameters);
    $user = $query->fetch();
    return $user ? $user['role'] : null;
}

function getModule($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM module WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertAdminQuestion($pdo, $message, $user_id){
    $query = 'INSERT INTO admin_message(message, date, user_id)
    VALUES (:message, CURDATE(), :user_id)';
    $parameters = [':message' => $message, ':user_id' => $user_id];
    query($pdo, $query, $parameters);
}

function deleteMessage($pdo, $id){
    $sql = 'DELETE FROM admin_message WHERE id = :id';
    $parameters = [':id' => $id];
    query($pdo, $sql, $parameters);
}

