<?php
include '../classes/Users.php';
session_start();

class Login {
    private $db;
    private $usersTable = 'users';

    public function __construct() {
        $this->db = new Database();
    }

    public function login($email, $password) {
        // todo: sql select user email 

        $sql = "SELECT * FROM " . $this->usersTable . " WHERE email = ?";
        $stmt = $this->db->connection->prepare($sql);

        if (!$stmt) {
            // Handle error, you might want to log it
            return false;
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            // Handle error, you might want to log it
            return false;
        }

        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION["id"] = $user['id_user'];
            $_SESSION["email"] = $user['email'];
            header('location: ../Views/tickets.php');
            exit();
        } else {
            // Password doesn't match
        }
        return $user;
    }
}

$login = new Login();

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $loginData = $login->login($email, $password);

    if ($loginData !== false) {

    } else {
        // User not found or an error occurred
        // Handle accordingly
    }
}
?>
