<?php include "templates/init.php";?>
<!DOCTYPE html>
<html>
<?php include "templates/head.php";?>

   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script type="text/javascript">
      var myvar={};
      myvar["nickname"] = '<?php echo $session_value; ?>';
      myvar["staticDir"] = '<?php echo constant("uploads"); ?>';
   </script>
   <body>
      <h1>Music Library </h1>
      <?php include "templates/menu.php";?>
      <?php if (array_key_exists('nickname', $_SESSION)): ?>
      <?php
// Song::loadAllSongsInDB();
$result = Song::getAllSongs($conn);
$arrayIds = User::getAllFavouriteSongs($conn, $_SESSION["nickname"]);
$pieces = explode("&", $_SERVER['QUERY_STRING']);
$query_params = array("genre" => "All", "fouvorite" => "false");
if ($pieces[0] !== "") {
    foreach ($pieces as $value) {
        $info = explode("=", $value);
        $query_params[$info[0]] = $info[1];
    }
}
$possibleValues = array("All", "Electronic", "Folk", "HipHop", "Jazz", "Pop", "Latin", "RB", "Rock");
?>


<form id="filter" action="../controllers/sort.php" method="post">
            <label for="genre">Жанр</label>
               <select name="genre" id="genre">
                  <option value="All">All</option>
                  <option value="Electronic"
                  <?php if (strcmp("Electronic", $query_params["genre"]) == 0) {echo "selected";}?>
                  >Electronic</option>
                  <option value="Folk"
                  <?php if (strcmp("Folk", $query_params["genre"]) == 0) {echo "selected";}?>
                  >Folk</option>
                  <option value="HipHop"
                  <?php if (strcmp("HP", $query_params["genre"]) == 0) {echo "selected";}?>
                  >Hip hop</option>
                  <option value="Jazz"
                  <?php if (strcmp("Jazz", $query_params["genre"]) == 0) {echo "selected";}?>
                  >Jazz</option>
                  <option value="Latin"
                  <?php if (strcmp("Latin", $query_params["genre"]) == 0) {echo "selected";}?>
                  >Latin</option>
                  <option value="Pop"
                   <?php if (strcmp("Pop", $query_params["genre"]) == 0) {echo "selected";}?>
                   >Pop</option>
                  <option value="Rock"
                  <?php if (strcmp("Rock", $query_params["genre"]) == 0) {echo "selected";}?>
                  >Rock</option>
               </select>
            </div>
            <?php if ((strcmp("true", $query_params["fouvorite"]) == 0)): ?>
            <span>Любими <input type="checkbox" name="favourite" value="true" checked>  </span>
            <?php else: ?>
            <span>Любими <input type="checkbox" name="favourite" value="true" >  </span>
      <?php endif?>

            <input type="submit" value="Филтрирай" name="submit">
   </form>
   <div id="content">
      <?php while ($row = $result->fetch()): ?>

      <?php if ((in_array($query_params["genre"], $possibleValues) &&
    strcmp($row["genre"], $query_params["genre"]) == 0) ||
    (!in_array($query_params["genre"], $possibleValues)) ||
    (strcmp("All", $query_params["genre"]) == 0)): ?>
    
      <?php if ((in_array($row["id"], $arrayIds) &&
    (strcmp("true", $query_params["fouvorite"]) == 0)) ||
    (strcmp("false", $query_params["fouvorite"]) == 0)): ?>

         <div class="song <?=$row["id"]?>">
            <div class = "songName">
               <div class="heart">
                  <?php if (in_array($row["id"], $arrayIds)): ?>
                  <i onclick="like(<?=$row["id"]?>)"  class="fa fa-heart"></i>
                  <?php else: ?>
                  <i onclick="like(<?=$row["id"]?>)"  class="fa fa-heart-o"></i>
                  <?php endif?>
               </div>
               <p class="<?=$row["id"]?>" >  <strong> Име: </strong> <?=$row["title"]?> </p>
               <p > <strong>  Жанр:  </strong> <?=$row["genre"]?> </p>
               <p > <strong>  Изпълнител:  </strong> <?=$row["artist"]?> </p>
            </div>
            <button class="button audioBtn <?=$row["id"]?> " type="submit" onclick="play(<?=$row["id"]?>)"><i class="fa fa-play"></i></button>
         </div>

      <?php endif?>
      <?php endif?>


      <?php endwhile;?>
      </div>

      <audio controls id="audio" src="">
      </audio>
      <?php endif?>
   </body>
   <script type="text/javascript" src="../js/ajax.js"></script>
   <script type="text/javascript" src="../js/home.js"></script>
   <script type="text/javascript" src="../js/common.js"></script>
</html>