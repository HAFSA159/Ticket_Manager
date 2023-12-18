<?php
session_start();

include '../classes/Database.php';

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $db = new Database();
    $conn = $db->getConnection();

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION["id"] = $user['id'];
            $_SESSION["email"] = $user['email'];

            header('location: ../Views/tickets.php');
            exit();
        }
    }

    $stmt->close();
    $db->close();
}
?>
