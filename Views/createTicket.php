<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/formticket.css">

    <title>Submit a Ticket</title>
</head>
<body>
<div class="login-box">
  <h2>Ticket</h2>
  <form action="tickets.php" method="post">
    <div class="user-box">
      <input type="text" name="titre" required="">
      <label>Titre</label>
    </div>
    <div class="user-box">
      <input type="text" name="description" required="">
      <label>Description</label>
    </div>
    <div class="user-box">
      <input type="text" name="attribute_To" required="">
      <label>Attribute To</label>
    </div>
    <div class="user-box">
      <label>Status</label>
        <select  name="status">
         <option value="" disabled selected></option>
         <option value="todo">To Do</option>
         <option value="InProgress">In Progress</option>
         <option value="Done">Done</option>
        </select>
    </div>   
    
    <div class="user-box">
      <label>Priority</label>
        <select name="priority">
         <option value="" disabled selected></option>
         <option value="high">High</option>
         <option value="medium">Medium</option>
         <option value="low">Low</option>
        </select>
    </div>
    <div class="user-box">
        <label>Ticket Date</label>
        <option value="" disabled selected></option>
        <input type="date" name="date" required="">
    </div>
    <a href="tickets.php">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a>
  </form>


</div>
</body>
</html>