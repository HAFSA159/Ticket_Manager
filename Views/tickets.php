<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/ticket.css">
    <title>Document</title>
</head>
<body>
    

<div style="margin:3em;">
<button type="button" class="btn btn-primary btn-lg " id="load1" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> 
Processing Order"><a href="../Views/create">Submit Ticket</a></button>
</div>

<h1><span class="blue">&lt;</span>Tickets<span class="blue">&gt;</span> <span class="yellow">To Treat</pan></h1>
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
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
</table>

<script>
	$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 8000);
});
</script>

</body>
</html>
			<!-- <select name="" id="">
			<option value="done">Done</option>
            <option value="in_progress">In Progress</option>
			<option value="to_do">To do</option>
			</select> -->