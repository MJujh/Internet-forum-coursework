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

function getJoke($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM joke WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateJoke($pdo,$jokeId,$joketext){
    $query = 'UPDATE joke SET joketext = :joketext WHERE id = :id';
    $parameters = [':joketext' => $joketext, ':id' => $jokeId];
    query($pdo, $query, parameters: $parameters);
}

function insertJoke($pdo, $joketext, $authorid, $cateid){
    $query = 'INSERT INTO joke(joketext, jokedate, authorid, cateid)
    VALUES (:joketext, CURDATE(), :authorid, :cateid)';
    $parameters =[':joketext' => $joketext, ':authorid' => $authorid, ':cateid' => $cateid];
    query($pdo, $query, $parameters);
}

function validateEmailAndPassword($pdo, $email, $password){
    $sql = 'SELECT COUNT(*) FROM user
            WHERE email = :email AND `password` = :password';
    $parameters = [':email' => $_POST["email"], ':password' => $_POST["password"]];
    $query = query($pdo,$sql,$parameters);
    $check = $query->fetch();
    return $check[0];
}