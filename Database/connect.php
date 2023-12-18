<?php

class DatabaseConnection
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "manager";
    private $dbh;
    protected $stmt;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname}";
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function escapeString($value)
    {
        // Since you are using PDO, there's no need for real_escape_string
        return $value;
    }

    public function executeQuery($sql)
    {
        $result = $this->dbh->query($sql);

        // if (!$result) {
        //     $this->lastError = $this->dbh->errorInfo()[2];
        // }

        return $result;
    }

}

$connect = new DatabaseConnection();

?>
