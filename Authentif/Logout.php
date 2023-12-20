<?php 
session_start();

if(isset($_SESSION)){
    session_unset();
    session_destroy();
    header('location : ../Views/login&signup.php');

}else {
    echo 'failed';
}


?>