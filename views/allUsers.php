<?php include "templates/init.php";?>
<!DOCTYPE html>
<html>
   <?php include "templates/head.php";?>
   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/statsStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/tableStyle.css">
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
          <h3>Статистика</h3>
         <?php if (Song::getMostListenSong($conn, null) == false): ?>
         <p>Най-слушана песен: Няма данни </p>
         <hr>
         <?php else: ?>
         <p>Най-слушана песен: <?=Song::getSongById($conn, Song::getMostListenSong($conn, null))?></p>
         <hr>
         <?php endif?>
         <p>Общо слушано време: <?=Song::getAllListenTime($conn, null)?> </p>
         <hr>
         <h3>Потребители</h3>
         <table>
         <tr>
            <th>Потребителско име</th>
            <th>Регистриран на</th>
         </tr>
         <?php while ($row = $result->fetch()): ?>
            <td><?=$row["nickname"]?></td>
            <td><?=$row["created_at"]?></td>
         </tr>

         <?php endwhile;?>
         </table>
         <?php endif?>
      </div>
   </body>
   <script type="text/javascript" src="../js/common.js"></script>
</html>