<?php
spl_autoload_register(function ($class_name) {
    include "../models/".$class_name . '.php';
});
$conn  = new PDO('mysql:host=localhost;dbname=project', 'root', '');
var_dump(json_decode(file_get_contents("php://input"), true));
if(is_null(json_decode(file_get_contents("php://input"), true) )){
	$current_information = $_POST;
	}
else{
	$current_information = json_decode(file_get_contents("php://input"), true);
}
if ($_POST) {
	$a1 = $current_information['nickname'];
	$a2 =  $current_information['song'];
	$a3 =  $current_information['duration'];
	var_dump(User::addListenSong($conn, $a1, $a2, $a3));
}
?>