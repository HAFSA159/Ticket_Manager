<?php 
include '../classes/Database.php';

class TicketManager {
    private $db;
    private $ticketsTable = 'tickets';

    public function __construct() {
        $this->db = new Database();
    }

    public function addTicket($titre, $description, $status, $priority, $ticket_date, $creator_id, $assign) {
        $sql = "INSERT INTO " . $this->ticketsTable . " (titre, description, status, priority, ticket_date, attribute_To, creator)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->connection->prepare($sql);

        if ($stmt === false) {
            return false;
        }
        $stmt->bind_param("sssssii", $titre, $description, $status, $priority, $ticket_date, $assign, $creator_id);

        $result = $stmt->execute();

        if ($result === false) {
            return false;
        }

        $stmt->close();

        return mysqli_insert_id($this->db->connection);
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
$data = $dataManager->getAllData(); 

if (isset($_POST["submit"])) {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $priority = $_POST["priority"];
    $ticket_date = $_POST["date"];
    $creator_id = $_SESSION["id"];
    $assign = $_POST["attribute_To"];

    $dataManager->addTicket($titre, $description, $status, $priority, $ticket_date, $creator_id, $assign);
    header('Location: ../Views/tickets.php');
}

?>

