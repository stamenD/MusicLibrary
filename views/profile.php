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
         <h3>Лични данни:</h3>
         <table id="infoProfile">
            <tr>
               <td>Потребителско име:</td>
               <td><?=$_SESSION["nickname"]?></td>
            </td>
            <tr>
               <td>Любими песни: </td>
               <td><?=count(User::getAllFavouriteSongs($conn, $_SESSION["nickname"]))?></td>
            </td>
            <tr>
               <td>Най-слушана песен: </td>
               <?php if (Song::getMostListenSong($conn, $_SESSION["nickname"]) == false): ?>
                     <td> Няма данни</td>
               <?php else: ?>
                     <td><?=Song::getSongById($conn, Song::getMostListenSong($conn, $_SESSION["nickname"]))?></td>
               <?php endif?>
            </td>
            <tr>
               <td>Общо слушано време:</td>
               <td><?=Song::getAllListenTime($conn, $_SESSION["nickname"])?></td>
            </tr>
         </table>
         <?php endif?>


      </div>
   </body>
   <script type="text/javascript" src="../js/common.js"></script>
</html>