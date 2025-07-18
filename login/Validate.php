<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    $check = validateEmailAndPassword($pdo, $_POST["email"], $_POST["password"]);
    $User_id = getUserId($pdo,$_POST["email"], $_POST["password"] );
    $User_role = getUserRole($pdo, $_POST["email"], $_POST["password"]);

    if ($check == 1){
        if ($User_role == 'admin') {

            session_start();
            $_SESSION["Authorised"] = "Y";
            $_SESSION["User_id"] = $User_id;
            header("Location:../admin/admin_index.php");
        } else {
            session_start();
            $_SESSION["Authorised"] = "Y";
            $_SESSION["User_id"] = $User_id;
            header("Location:../user/user_index.php");
        }
    }else{
        header("Location:login.html?error=1");
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