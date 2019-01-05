<?php
$args = array($_SERVER['DOCUMENT_ROOT'], "config", "globals.php");
require join(DIRECTORY_SEPARATOR, $args);
?>
<?php
$conn = new PDO("mysql:host=" . Globals::$mysqlHost . ";dbname=" . Globals::$mysqlDbname, Globals::$mysqlUsername, Globals::$mysqlPassword);

$stms3 = $conn->query("SELECT * FROM users ") or die("failed!");
while ($row = $stms3->fetch(PDO::FETCH_ASSOC)) {
    if ($_POST['nickname'] === $row['nickname'] && password_verify((string) $_POST['password'], (string) $row['password'])) {
        session_start();
        $_SESSION['nickname'] = $row['nickname'];
        header("Location: ../views/home.php");
        die();
    }
}
header("Location: ../views/login.php?info=true");
die();
