<?php
$location = "Location: ../views/home.php";

var_dump($_POST);
if (!isset($_POST['favourite'])) {
    $_POST["favourite"] = "false";
}

if (strlen($_POST["genre"]) > 0) {
    $location .= '?genre=' . $_POST["genre"] . "&fouvorite=" . $_POST["favourite"];
} else {
    $location .= '?fouvorite=' . $_POST["favourite"];
}

header($location);
die();
