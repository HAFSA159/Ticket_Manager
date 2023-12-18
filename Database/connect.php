<?php

class DatabaseConnection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "manager";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $this->createTables();
    }

    public function createTableUser()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id_user INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        $this->conn->query($sql);
    }

    public function createTableTicket()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Tickets (
            id_ticket INT AUTO_INCREMENT PRIMARY KEY,
            titre VARCHAR(255) NOT NULL,
            description VARCHAR(300) NOT NULL,
            attribute_To INT,
            FOREIGN KEY (attribute_To) REFERENCES Users(id_user),
            status ENUM('done', 'in progress', 'doing') NOT NULL,
            priority ENUM('urgent', 'normal', 'low') NOT NULL,
            ticket_date VARCHAR(255) NOT NULL
        )";
        $this->conn->query($sql);
    }

    public function createTableUser_Ticket()
    {
        $sql = "CREATE TABLE IF NOT EXISTS UserTicket (
            id_user INT,
            id_ticket INT,
            FOREIGN KEY (id_user) REFERENCES Users(id_user),
            FOREIGN KEY (id_ticket) REFERENCES Tickets(id_ticket)
        )";
        $this->conn->query($sql);
    }

    public function createTableTag()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Tags (
            id_tag INT AUTO_INCREMENT PRIMARY KEY,
            libelle VARCHAR(255) NOT NULL
        )";
        $this->conn->query($sql);
    }

    public function createTableTag_Ticket()
    {
        $sql = "CREATE TABLE IF NOT EXISTS TagTicket (
            id_tag INT,
            id_ticket INT,
            FOREIGN KEY (id_tag) REFERENCES Tags(id_tag),
            FOREIGN KEY (id_ticket) REFERENCES Tickets(id_ticket)
        )";
        $this->conn->query($sql);
    }

    public function createTableComment()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Comments (
            id_comment INT AUTO_INCREMENT PRIMARY KEY,
            comment VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL
        )";
        $this->conn->query($sql);
    }

    public function createTables()
    {
        $this->createTableUser();
        $this->createTableTicket();
        $this->createTableUser_Ticket();
        $this->createTableTag();
        $this->createTableTag_Ticket();
        $this->createTableComment();
    }
}

?>
