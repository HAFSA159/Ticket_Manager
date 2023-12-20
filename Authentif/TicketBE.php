<?php 
session_start();
require_once "../classes/Users.php";

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

    function getTags() {
        $sql = "SELECT * FROM tags";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->execute();
        $res = $stmt->get_result();
        $tags = [];
        while ($row = mysqli_fetch_assoc($res)) {
            $tags[] = $row;
        }
        return $tags;
    }

    function addTag($ticket_id, $tag_id) {
        $sql = "INSERT INTO tagticket (id_tag, id_ticket) VALUES ('$tag_id', '$ticket_id')";
        $stmt = $this->db->connection->prepare($sql);
        $stmt->execute();
    }

    public function getAllData() {
        $sql = "SELECT tickets.*, users.username FROM " . $this->ticketsTable . " 
        JOIN users ON tickets.attribute_To=users.id_user";
        $result = $this->db->query($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getASpecificTags($ticket_id) {
        $sql = "SELECT tickets.id_ticket, tags.* FROM tagticket 
        JOIN tickets ON tagticket.id_ticket=tickets.id_ticket
        JOIN tags ON tagticket.id_tag=tags.id_tag
        WHERE tagticket.id_ticket='$ticket_id'";
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
            echo '<td>' . $row['username'] . '</td>';
            echo '<td class="' . $this->getStatusColorClass($row['status']) . '">' . $row['status'] . '</td>';
            echo '<td>' . $row['priority'] . '</td>';
            echo '<td> ';
            $specificTag = $this->getASpecificTags($row["id_ticket"]);
            foreach($specificTag as $tag) {
                echo " ";
                echo $tag["libelle"];
                echo " ";
            }
            echo ' </td>';
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

$tags = $dataManager->getTags();

if (isset($_POST["submit"])) {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $status = $_POST["status"];
    $priority = $_POST["priority"];
    $ticket_date = $_POST["date"];
    $creator_id = $_SESSION["id"];
    $assign = $_POST["attribute_To"];
    $tags = $_POST["tags"];

    $ticket_id = $dataManager->addTicket($titre, $description, $status, $priority, $ticket_date, $creator_id, $assign);

    foreach($tags as $tag) {
        $dataManager->addTag($ticket_id, $tag);
    }
    header('Location: ../Views/tickets.php');
}

?>

