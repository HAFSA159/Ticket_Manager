<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'manager';
    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

    }
    function insertTags()
    {
        $sql = "INSERT INTO tags (libelle)
        VALUES
        ('Bug'),
        ('Feature Request'),
        ('Enhancement'),
        ('Documentation'),
        ('User Interface (UI)'),
        ('User Experience (UX)'),
        ('Performance'),
        ('Security'),
        ('Testing'),
        ('Backend'),
        ('Frontend'),
        ('Accessibility')
        ON DUPLICATE KEY UPDATE libelle = VALUES(libelle)";
        $this->query($sql);
    }

    public function query($sql)
    {
        return $this->connection->query($sql);
    }

    function conn()
    {
        return $this->connection;
    }

    public function single($sql)
    {
        $result = $this->connection->query($sql);

        if ($result === false) {
            // Handle error, e.g., return false or throw an exception
            return false;
        }

        $row = $result->fetch_assoc();

        $result->close(); // Close the result set

        return $row;
    }

    public function resultSet($sql)
    {
        $result = $this->connection->query($sql);

        if ($result === false) {
            // Handle error, e.g., return false or throw an exception
            return false;
        }

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close(); // Close the result set

        return $data;
    }

    public function close()
    {
        $this->connection->close();
    }
}
