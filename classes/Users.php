<?php
     include_once 'Database.php';
    class Users extends Database {
        private $UserTable = 'users';
        private $sql;
        private $conn;

        public function listUsers() {
            $this->conn = parent::conn();
            $this->sql = "SELECT * FROM {$this->UserTable}";
            $stmt = mysqli_stmt_init($this->conn);
            mysqli_stmt_prepare($stmt, $this->sql);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
                return $users;
        }
    
        public function insertUser($username, $email, $hashed_password) {
            $this->conn = parent::conn();
            $this->sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($this->conn);
            mysqli_stmt_prepare($stmt, $this->sql);
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
            mysqli_stmt_execute($stmt);
        }
    
        public function updateUser() {
    
        }
    
        public function deleteUser() {
    
        }
    }

    $db = new Database();
    $user = new Users();
    $users = $user->listUsers();
    
    


?>
