<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'manager';

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM ticket";
$result = $connection->query($query);

while ($row = $result->fetch_assoc()) {
    print_r($row);
}

$connection->close();
?>