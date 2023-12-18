<?php
require "../classes/Database.php";

class Users extends Database
{
    private $userstable = 'Users';

    public function readUsers()
    {
        $this->query('SELECT * FROM ' . $this->userstable);
        $this->execute();
    }

    public function deleteEmptyFields()
    {
        $this->query("DELETE FROM $this->userstable WHERE username = null");
        $this->execute();
    }

    public function insert($username, $email, $password)
    {
        $this->query("INSERT INTO users (
            username, email, password
        ) VALUE(:username, :email, :password);");
        $this->bind(":username", $username);
        $this->bind(":email", $email);
        $this->bind(":password", $password);
        $this->execute();
    }
    
}

$auth = new Users();

?>
