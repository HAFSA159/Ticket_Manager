<?php
include "../Authentif/TicketBE.php";

$ticket = new TicketManager();
$data = $ticket->getAllData();
$ticketTable = $ticket->displayDataInTable($data);

$output = " .$ticketTable. ";

echo $output;

?>