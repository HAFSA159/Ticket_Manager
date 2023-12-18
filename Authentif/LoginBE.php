<?php 
session_start();

include '../classes/Users.php';

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query); //run

    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {


            $_SESSION["id"] = $user['id'];
            $_SESSION["email"] = $user['email'];

            header('location: ../Views/login&signup.php');
        }
    }
}


?>
