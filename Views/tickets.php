<?php 
include '../classes/Database.php';

class DataManager {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function getAllData() {
        $sql = "SELECT * FROM tickets";
        $result = $this->db->query($sql);

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function displayDataInTable($data) {
        foreach ($data as $row) {
            echo '<tr>';
            echo '<td>' . $row['titre'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>' . $row['attribute_To'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td>' . $row['priority'] . '</td>';
            echo '<td>' . $row['ticket_date'] . '</td>';
            echo '</tr>';
        }
    }

    public function closeConnection() {
        $this->db->close();
    }
}

$dataManager = new DataManager();
$data = $dataManager->getAllData(); 
$dataManager->closeConnection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/ticket.css">
    <title>tickets</title>
    <style>
            
    </style>
</head>
<body>

<div class="frame">
  <button class="custom-btn btn-1"><a href="createTicket.php">Submit Ticket</a></button> 

<h1><span class="blue">&lt;</span>Tickets<span class="blue">&gt;</span> <span style="color: #57ac54;">To Treat</span></h1>
<h2>Created with love by <a href="#" target="_blank">Hafsa</a></h2>

<table class="container">    
    <thead>
        <tr>
            <th><h1>Title</h1></th>
            <th><h1>Description</h1></th>
            <th><h1>Attribute To</h1></th>
            <th><h1>Status</h1></th>
            <th><h1>Priority</h1></th>
            <th><h1>Ticket Date</h1></th>
        </tr>
    </thead>
    <tbody>
        <?php $dataManager->displayDataInTable($data); ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
<script>
    $('.btn-1').on('click', function() { // Corrected the button selector
        var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
            $this.button('reset');
        }, 8000);
    });
</script>

</body>
</html>
