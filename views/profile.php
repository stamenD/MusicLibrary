<?php include "templates/init.php"; ?>
<!DOCTYPE html>
<html>
<?php include "templates/head.php"; ?>

   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/statsStyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
      <h1>Music Library </h1>
      <?php include "templates/menu.php"; ?>
      <div id="content">
         <?php if(array_key_exists('nickname', $_SESSION)): ?> 
         <p>Потребителско име: <?= $_SESSION["nickname"] ?></p>
         <hr>
         <p>Любими песни: <?= count(User::getAllFavouriteSongs($conn, $_SESSION["nickname"])) ?></p>
         <hr>
         <?php if(Song::getMostListenSong($conn, $_SESSION["nickname"]) == false) :?> 
         <p>Най-слушана песен: Няма данни</p>
         <hr>
         <?php else:?> 
         <p>Най-слушана песен: <?= Song::getSongById($conn, Song::getMostListenSong($conn, $_SESSION["nickname"]))?></p>
         <hr>
         <?php endif ?>
         <?php endif ?>
         <p>Общо слушано време: <?= Song::getAllListenTime($conn,  $_SESSION["nickname"])?> </p>
         <hr>
         <h3>История:</h3>
         <ul>
            <?php $result = User::getAllListenSongs($conn, $_SESSION["nickname"]);?> 
            <?php while ($row = $result->fetch()):?>
            <li>
               <?= Song::getSongById($conn, $row["id_song"]) ?> <br> <?=$row["duration"]?> <br> <?=$row["listen_at"]?> <br> <br>
            </li>
            <?php endwhile; ?>
         </ul>
      </div>
   </body>
   <script type="text/javascript" src="../js/common.js"></script>
</html>