<?php
// session_start();
include '../Authentif/TicketBE.php';

if(!isset($_SESSION['id'])){
    header('location: login&signup.php');
}

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
  <button class="custom-btn btn-1" ><a href="createTicket.php"style="text-decoration: none; color:white;">Add Ticket</a></button> 
  <button class="custom-btn btn-1" ><a href="../Authentif/Logout.php"style="text-decoration: none; color:white;">Logout</a></button> 
</div>
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
            <th><h1>Tags</h1></th>
            <th><h1>Ticket Date</h1></th>
        </tr>
    </thead>
    <tbody id="tbody"> 
    </tbody>
</table>

<script src="../Public/style.js"></script>

</body>
</html>
