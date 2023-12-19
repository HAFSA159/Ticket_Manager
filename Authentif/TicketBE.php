<?php 
include '../classes/Database.php';

class TicketManager {
    private $db;
    private $ticketsTable = 'tickets';

    public function __construct() {
        $this->db = new Database();
    }

    public function addTicket($titre, $description, $status, $priority, $ticket_date) {
        $sql = "INSERT INTO " . $this->ticketsTable . " (titre, description, status, priority, ticket_date)
        VALUES (?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $this->db->connection->prepare($sql);

        if ($stmt === false) {
            // Handle error, e.g., return false or throw an exception
            return false;
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssss", $titre, $description, $status, $priority, $ticket_date);

        // Execute the statement
        $result = $stmt->execute();

        // Check for success
        if ($result === false) {
            // Handle error, e.g., return false or throw an exception
            return false;
        }

        // Close the statement
        $stmt->close();

        return true;
    }

    public function getAllData() {
        $sql = "SELECT * FROM " . $this->ticketsTable;
        $result = $this->db->query($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getStatusColorClass($status) {
        switch ($status) {
            case 'done':
                return 'status-done';
            case 'doing':
                return 'status-todo';
            case 'in process':
                return 'status-in-process';
            default:
                return '';
        }
    }

    public function displayDataInTable($data) {
        foreach ($data as $row) {
            echo '<tr>';
            echo '<td>' . $row['titre'] . '</td>';
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>' . $row['attribute_To'] . '</td>';
            echo '<td class="' . $this->getStatusColorClass($row['status']) . '">' . $row['status'] . '</td>';
            echo '<td>' . $row['priority'] . '</td>';
            echo '<td>' . $row['ticket_date'] . '</td>';
            echo '</tr>';
        }
    }
   
    public function __destruct() {
        if ($this->db) {
            $this->db->close();
        }
    }

}

$dataManager = new TicketManager();
// $dataManager->getAllData(); 

header('../Views/tickets.php');

?>

