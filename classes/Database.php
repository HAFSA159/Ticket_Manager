<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'manager';



$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    echo 'failed';  
}


?>
