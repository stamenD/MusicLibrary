<?php
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();
header("Location: ../views/home.php");
die();
