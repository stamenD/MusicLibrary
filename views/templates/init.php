<?php
   session_start();
   $session_value = (isset($_SESSION['nickname'])) ? $_SESSION['nickname'] : '';
   spl_autoload_register(function ($class_name) {
       include "../models/".$class_name . '.php';
   });
   $conn = new PDO('mysql:host=localhost;dbname=project', 'root', '');
?>