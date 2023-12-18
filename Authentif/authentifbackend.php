<?php
require("../Database/connect.php");

class Authentification extends DatabaseConnection
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

    public function insert($username, $email, $password, $confirm_Password)
    {
        $this->query("INSERT INTO users (
            username, email, password, confirm_Password
        ) VALUE(:username, :email, :password, :confirm_Password);");
        $this->bind(":username", $username);
        $this->bind(":email", $email);
        $this->bind(":password", $password);
        $this->bind(":confirm_Password", $confirm_Password);
        $this->execute();
    }
}

$auth = new Authentification();
?>
