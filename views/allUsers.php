<?php include "templates/init.php";?>
<!DOCTYPE html>
<html>
   <?php include "templates/head.php";?>
   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/statsStyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
      <h1>Music Library </h1>
      <?php include "templates/menu.php";?>
      <div id="content">
         <?php if (array_key_exists('nickname', $_SESSION)): ?>
         <?php
// Song::loadAllSongsInDB();
$result = User::getAllUsers($conn);
?>
         <?php while ($row = $result->fetch()): ?>
         Потребителско име:   <?=$row["nickname"]?>
         <br> Регистриран на:   <?=$row["created_at"]?>
         <hr>
         <br>
         <?php endwhile;?>
         <?php endif?>
      </div>
   </body>
   <script type="text/javascript" src="../js/common.js"></script>
</html>