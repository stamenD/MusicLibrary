<?php
   session_start();
   $session_value = (isset($_SESSION['nickname'])) ? $_SESSION['nickname'] : '';
   spl_autoload_register(function ($class_name) {
       include "../models/".$class_name . '.php';
   });
   $conn = new PDO('mysql:host=localhost;dbname=project', 'root', '');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Music Library</title>
      <link rel="icon" href="../static/imgs/music.ico">
   </head>
   <link rel="stylesheet" type="text/css" href="../styles/homeStyle.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <body>


      <h1>Music Library </h1>
      <aside class="parent">
         <?php if (array_key_exists('nickname', $_SESSION)):?>
         <div>
            <a href="./home.php">
               <p>Начало</p>
            </a>
         </div>
         <div>
            <a href="./profile.php">
               <p>Профил</p>
            </a>
         </div>
         <div>
            <a href="./stats.php">
               <p>Статистика</p>
            </a>
         </div>
         <div>
            <a href="./allUsers.php">
               <p>Потребители</p>
            </a>
         </div>
         <div id="loginPanel">
            <p>Добре дошъл,  <?=$_SESSION["nickname"] ?>  </p>
            <?php else:?>
            <div id="loginPanel">
               <p>Добре дошъл,Гост </p>
               ;
               <?php endif?>
               <?php if(!array_key_exists('nickname', $_SESSION)) :?> 
               <form action="../views/login.php" method="GET"> 
                  <button class="button " type="submit"><i class="fa fa-sign-in"></i></button>
               </form>
               <span class="clear"></span>';
            </div>
            <span class="clear"></span>
      </aside>
      <?php else: ?> 
      <form action="../controllers/logout.php" method="POST"> 
      <button class="button " type="submit"><i class="fa fa-sign-out"></i></button>
      </form>
      <span class="clear"></span>
      <?php endif ?>
      </div>
      <span class="clear"></span>
      </aside>

      
      <div id="content">

      </div>
   </body>
</html>