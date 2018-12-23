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
                <?php
session_start();

if (array_key_exists('nickname', $_SESSION)) {
    echo '
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
            <a href="">
                <p>Статистика</p>
            </a>
        </div>
        <div>
            <a href="">
                <p>Потребители</p>
            </a>
        </div>
           <div id="loginPanel">
            <p>Добре дошъл,' . $_SESSION["nickname"] . '</p>';
} else {
    echo '<div id="loginPanel">

            <p>Добре дошъл,Гост </p>';
}

?>
           <?php
if (!array_key_exists('nickname', $_SESSION)) {
    echo '<form action="../views/login.php" method="GET"> 
        <button class="button " type="submit"><i class="fa fa-sign-in"></i></button>
   </form>
        <span class="clear"></span>';
?>
       </div>
        <span class="clear"></span>
    </aside>

    <?php
} else {
    echo '
    <form action="../server/logout.php" method="POST"> 
        <button class="button " type="submit"><i class="fa fa-sign-out"></i></button>
   </form>
        <span class="clear"></span>
   ';
?>
       </div>
        <span class="clear"></span>
        </aside>

        <div id="content">
            <?php
    $files = scandir("../static");
    for ($i = 0; $i < count($files); $i++) {
        if (strpos($files[$i], ".mp3")) {
            echo '
       <div class="song ' . $i . '">
 
       <div class = "songName">
             <div class="heart">
  <i onclick="like(' . $i . ')" class="fa fa-heart-o"></i>
</div>
       <p class=' . $i . '>Name: ' . $files[$i] . '</p>
        </div>
       <button class="button audioBtn ' . $i . '" type="submit" onclick="play(' . $i . ')"><i class="fa fa-play"></i></button>
       </div>';
        }
    }
    
    echo '
    <audio controls id="audio" src=""> 
    </audio>

  ';
    
}
?>
       </div>
</body>
<script type="text/javascript" src="../js/home.js">
</script>

</html>