<?php 
include '../classes/Users.php';

if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirm_Password= $_POST['confirm_Password'];
    
    if($password !== $confirm_Password) {
        echo("Password do not match!");
        exit;
    }

    $userObj = new Users();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $userObj->insertUser($username, $email, $hashed_password);
    header('location: ../Views/login&signup.php');
}



?>