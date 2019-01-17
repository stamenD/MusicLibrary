<?php include "./views/templates/init.php";?>
<?php if (array_key_exists('nickname', $_SESSION)): ?>
<?php
header("Location: ./views/home.php");
die();
?>
<?php else: ?>
<?php
header("Location: ./views/register.php");
die();
?>
<?php endif?>

