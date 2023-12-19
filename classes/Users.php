<?php
    class Users extends Database {
        private $Users = 'users';

        public function listUsers() {
            $this->query("SELECT * FROM ". $this->Users);
        }
    
        public function insertUser() {
    
        }
    
        public function updateUser() {
    
        }
    
        public function deleteUser() {
    
        }
    }

    $user = new Users();
    $user->listUsers();


?>
