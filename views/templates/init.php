<?php
$args = array($_SERVER['DOCUMENT_ROOT'], "config", "globals.php");
require join(DIRECTORY_SEPARATOR, $args);
?>

<?php
session_start();
$session_value = (isset($_SESSION['nickname'])) ? $_SESSION['nickname'] : '';
spl_autoload_register(function ($class_name) {
    include "../models/" . $class_name . '.php';
});
try {
//    echo "mysql:host=".Globals::$mysqlHost.";dbname=".Globals::$mysqlDbname,;
    $conn = new PDO(
        "mysql:host=" . Globals::$mysqlHost . ";dbname=" . Globals::$mysqlDbname,
        Globals::$mysqlUsername,
        Globals::$mysqlPassword);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>