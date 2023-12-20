<?php
include '../Authentif/TicketBE.php';
?>

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

    <form action="../Authentif/TicketBE.php" method="post">
      <div class="user-box">
        <input type="text" name="titre" required="">
        <label>Titre</label>
      </div>
      <div class="user-box">
        <input type="text" name="description" required="">
        <label>Description</label>
      </div>
      <div class="relative inline-flex self-center">
        <select name="attribute_To" class="text-2xl font-bold rounded border-2 border-purple-700 text-black-600 h-14 w-60 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
          <?php foreach ($users as $user) { ?>
            <option value="<?= $user["id_user"] ?>" style="color: black;"><?= $user["username"] ?></option>
          <?php } ?>
        </select>
      </div>
      <div>
        <label style="color: white;">Status</label>
        <select name="status">
          <option value="" disabled selected></option>
          <option value="todo" style="background-color: red;">To Do</option>
          <option value="InProgress" style="background-color: orange;">In Progress</option>
          <option value="Done" style="background-color: green;">Done</option>
        </select>
      </div>

      <div>
        <label style="color: white;">Priority</label>
        <select name="priority">
          <option value="" disabled selected></option>
          <option value="high" style="background-color: red;">High</option>
          <option value="medium" style="background-color: orange;">>Medium</option>
          <option value="low" style="background-color: green;">>Low</option>
        </select>
      </div>
      <div>
        <label style="color: white;">Tags</label>
        <select name="tags[]" multiple>
          <?php foreach ($tags as $tag) : ?>
            <option value="<?= $tag["id_tag"] ?>" style="color: black;"><?= $tag["libelle"] ?></option>
          <?php endforeach ?>
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
        <input type="submit" name="submit" value="Submit" style="background: none; text-decoration:none; border:none; color:white;">
      </a>
    </form>


  </div>
</body>

</html>