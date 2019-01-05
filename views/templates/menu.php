 <aside class="parent">
         <?php if (array_key_exists('nickname', $_SESSION)): ?>
            <a href="./home.php">
         <div onclick="markSelected()">
               <p>Начало</p>
         </div>
            </a>
            <a href="./profile.php">
         <div onclick="markSelected()">
               <p>Профил</p>
         </div>
            </a>
            <a href="./stats.php">
         <div onclick="markSelected()">
               <p>Статистика</p>
         </div>
            </a>
            <a href="./allUsers.php">
         <div onclick="markSelected()">
               <p>Потребители</p>
         </div>
            </a>
         <div id="loginPanel">
            <p>Добре дошъл,  <?=$_SESSION["nickname"]?>  </p>
            <?php else: ?>
            <div id="loginPanel">
               <p>Добре дошъл,Гост </p>
               <?php endif?>
               <?php if (!array_key_exists('nickname', $_SESSION)): ?>
               <form action="../views/login.php" method="GET">
                  <button class="button " type="submit"><i class="fa fa-sign-in"></i></button>
               </form>
               <span class="clear"></span>
            </div>
            <span class="clear"></span>
      </aside>
      <?php else: ?>
      <form action="../controllers/logout.php" method="POST">
      <button class="button " type="submit"><i class="fa fa-sign-out"></i></button>
      </form>
      <span class="clear"></span>
      <?php endif?>
      </div>
      <span class="clear"></span>
      </aside>