<?php include "templates/init.php";?>
<!DOCTYPE html>
<html>
<?php include "templates/head.php";?>

   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script type="text/javascript">
      var myvar={};
      myvar["nickname"] = '<?php echo $session_value; ?>';
   </script>
   <body>
      <h1>Music Library </h1>
      <?php include "templates/menu.php";?>
      <?php if (array_key_exists('nickname', $_SESSION)): ?>
      <?php
// Song::loadAllSongsInDB();
$result = Song::getAllSongs($conn);
$arrayIds = User::getAllFavouriteSongs($conn, $_SESSION["nickname"]);
?>
      <?php while ($row = $result->fetch()): ?>
      <div id="content">
         <div class="song <?=$row["id"]?>">
            <div class = "songName">
               <div class="heart">
                  <?php if (in_array($row["id"], $arrayIds)): ?>
                  <i onclick="like(<?=$row["id"]?>)"  class="fa fa-heart"></i>
                  <?php else: ?>
                  <i onclick="like(<?=$row["id"]?>)"  class="fa fa-heart-o"></i>
                  <?php endif?>
               </div>
               <p class="<?=$row["id"]?>" >  Name: <?=$row["title"]?> </p>
            </div>
            <button class="button audioBtn <?=$row["id"]?> " type="submit" onclick="play(<?=$row["id"]?>)"><i class="fa fa-play"></i></button>
         </div>
      </div>
      <?php endwhile;?>
      <audio controls id="audio" src="">
      </audio>
      <?php endif?>
   </body>
   <script type="text/javascript" src="../js/ajax.js"></script>
   <script type="text/javascript" src="../js/home.js"></script>
   <script type="text/javascript" src="../js/common.js"></script>
</html>