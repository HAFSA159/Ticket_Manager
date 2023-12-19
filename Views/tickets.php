<?php 
include '../Authentif/TicketBE.php';
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
            <th><h1>Ticket Date</h1></th>
        </tr>
    </thead>
    <tbody>
        <?php $dataManager->displayDataInTable($data); ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script>
    $('.btn-1').on('click', function() { 
        var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
            $this.button('reset');
        }, 8000);
    });
</script>

</body>
</html>
