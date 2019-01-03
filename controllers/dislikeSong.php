<?php
$args = array($_SERVER['DOCUMENT_ROOT'] ,"config","globals.php");
require join(DIRECTORY_SEPARATOR  , $args);
?>
<?php
spl_autoload_register(function ($class_name) {
    include "../models/".$class_name . '.php';
});
$conn  = new PDO("mysql:host=".Globals::$mysqlHost.";dbname=".Globals::$mysqlDbname, Globals::$mysqlUsername,Globals::$mysqlPassword );
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
	var_dump(User::removeFavouriteSong($conn,$a1,$a2));
}
?>