<?php include "templates/init.php";?>
<!DOCTYPE html>
<html>
   <?php include "templates/head.php";?>
   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/statsStyle.css">
   <link rel="stylesheet" type="text/css" href="../styles/uploadPage.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>
      <h1>Music Library </h1>
      <?php include "templates/menu.php";?>
      <div id="content">
            <form action="../controllers/upload.php" method="post" enctype="multipart/form-data">
              <h2>Качи своята песен</h2>

            <div class="innerBlock">

               <div class="leftInnerBlock">
               <label for="title">Заглавие</label>
               </div>

               <div class="rightInnerBlock">
               <input maxlength="50" required type="text" name="title" id="title">
               </div>

            </div>

            <div class="innerBlock">
               <div class="leftInnerBlock">
               <label for="artist">Изпълнител</label>
               </div>
               <div class="rightInnerBlock">
               <input maxlength="50" required type="text" name="artist" id="artist">
               </div>
            </div>

            <div class="innerBlock">
               <label for="genre">Жанр</label>
               <select name="genre" id="genre">
                  <option value="Unknown">Unknown</option>
                  <option value="Electronic">Electronic</option>
                  <option value="Folk">Folk</option>
                  <option value="HipHop">Hip hop</option>
                  <option value="Jazz">Jazz</option>
                  <option value="Latin">Latin</option>
                  <option value="Pop">Pop</option>
                  <option value="Rock">Rock</option>
               </select>
            </div>



            <div class="innerBlock">
               <input required type="file" name="fileToUpload" id="fileToUpload" accept=".mp3">
            </div>
            <div class="innerBlock">
               <input required type="submit" value="Upload" name="submit">
            </div>
            </form>
      </div>
   </body>
   <script type="text/javascript" src="../js/common.js"></script>
</html>