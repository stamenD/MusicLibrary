<?php
var_dump($_POST);
// var_dump($_FILES);
spl_autoload_register(function ($class_name) {
    echo "<br>";
    if (strcmp($class_name, "Globals") == 0) {
        echo $class_name;
        include "../config/globals.php";
    } else {
        echo $class_name;
        include "../models/" . $class_name . '.php';
    }
});
$conn = new PDO("mysql:host=" . Globals::$mysqlHost . ";dbname=" . Globals::$mysqlDbname, Globals::$mysqlUsername, Globals::$mysqlPassword);
$target_dir = constant("uploads");
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
// echo $_FILES["fileToUpload"]["size"];
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "mp3") {
    echo "Sorry, only MP3 files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $target_file2 = "";
    $result = Song::getLastSongId($conn);
    while ($row = $result->fetch()) {
        $target_file2 = $target_dir . $row["MAXID"] . ".mp3";
    }
    echo $target_file2;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file2)) {

        if (strcmp($_POST["title"], "") == 0) {
            $_POST["title"] = "Unknown";
        }

        if (strcmp($_POST["genre"], "") == 0) {
            $_POST["genre"] = "Unknown";
        }

        if (strcmp($_POST["artist"], "") == 0) {
            $_POST["artist"] = "Unknown";
        }

        var_dump($_POST);
        Song::uploadSong($conn, $_POST);
        header("Location: ../views/home.php");
        die();
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
