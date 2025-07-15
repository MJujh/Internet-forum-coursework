<?php
function totalQuestions($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function totalAuthors($pdo){
    $query = query($pdo,'SELECT COUNT(*) FROM author');
    $row = $query->fetch();
    return $row[0];
}

function totalCates($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM category');
    $row = $query->fetch();
    return $row[0];
}

function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function getQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateQuestion($pdo,$id,$text_content){
    $query = 'UPDATE question SET text_content = :text_content WHERE id = :id';
    $parameters = [':text_content' => $text_content, ':id' => $id];
    query($pdo, $query, parameters: $parameters);
}

function insertQuestion($pdo, $text_content, $userid, $moduleid){
    $query = 'INSERT INTO question(text_content, date, user_id, module_id)
    VALUES (:text_content, CURDATE(), :user_id, :module_id)';
    $parameters =[':text_content' => $text_content, ':user_id' => $userid, ':module_id' => $moduleid];
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