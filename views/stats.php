<?php include "templates/init.php";?>
<!DOCTYPE html>
<html>
<?php include "templates/head.php";?>

   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/tableStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/statsStyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
      <h1>Music Library </h1>
      <?php include "templates/menu.php";?>
      <div id="content">
         <?php if (array_key_exists('nickname', $_SESSION)): ?>
         <h3>История:</h3>
            <?php $result = User::getAllListenSongs($conn, $_SESSION["nickname"]);?>
            <table>
            <tr>
               <th> Име: </th>
               <th>  Слушана на: </th>
               <th>  Продължителност:</th>
            </tr>
            <?php while ($row = $result->fetch()): ?>
            <tr>
               <td> <?=Song::getSongById($conn, $row["id_song"])?> </td>
               <td>  <?=$row["listen_at"]?> </td>
               <td>  <?=substr ($row["duration"],1,4)?></td>
            </tr>
            <?php endwhile;?>
            </table>
         <?php endif?>
      </div>
   </body>
   <script type="text/javascript" src="../js/common.js"></script>
</html>