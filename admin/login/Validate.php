<?php
try{
    include '../../includes/DatabaseConnection.php';
    include '../../includes/DatabaseFunctions.php';

    $check = validateEmailAndPassword($pdo, $_POST["email"], $_POST["password"]);

    if ($check == 1){
            session_start();
            $_SESSION["Authorised"] = "Y";
            header("Location:../index.php");
    }else{
        header("Location:Wronglogin.php");
    } 



/*     $title='User info';
    if ($_POST["email"] == $email){
        if($_POST["password"] == $user["password"]){
            session_start();
            $_SESSION["Authorised"] = "Y";
            header("Location:index.php");
        }else{
            header("Location:Wronglogin.php");
        }
    }else{
            header("Location:Wronglogin.php");
        }
 */

}catch (PDOException $e) {
  $title = 'An error has occurred';
  $output = 'Database error: ' . $e->getMessage();}