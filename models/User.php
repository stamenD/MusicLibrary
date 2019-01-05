<?php

class User
{
    private $nickname;
    private $created_at;
    private $isAdmin;
    private $favouriteSongs = array();

    public function __construct($nickname, $created_at, $isAdmin)
    {
        $this->nickname = $nickname;
        $this->created_at = $created_at;
        $this->isAdmin = $isAdmin;
        # code...
    }

    public static function getAllUsers($conn)
    {
        $result = $conn->query("SELECT * FROM `users`;");
        return $result;
    }

    public static function addUser($conn, $args)
    {
        $result = $conn
            ->prepare("INSERT INTO `users` (`nickname`, `password`) VALUES (?,?);")
            ->execute($args);
        return $result;
    }

    public static function getAllFavouriteSongs($conn, $nickname)
    {
        $result = $conn->query('SELECT * FROM `liked_songs` WHERE nickname = "' . $nickname . '";');
        // ->execute([$nickname]);
        $arrayIds = array();
        while ($row = $result->fetch()) {
            array_push($arrayIds, $row["id_song"]);
        }
        return $arrayIds;
    }

    public static function getAllListenSongs($conn, $nickname)
    {
        $result = $conn->query('SELECT * FROM `listen_songs` WHERE nickname = "' . $nickname . '" ORDER BY listen_at DESC;');
        return $result;
        // $arrayIds = array();
        // while ($row = $result->fetch()) {
        //     array_push($arrayIds, $row["id_song"]);
        // }
        // return $arrayIds;
    }

    public static function addFavouriteSong($conn, $nickname, $id)
    {
        $result = $conn
            ->prepare("INSERT INTO `liked_songs`(`id_song`, `nickname`) VALUES  (?,?);")
            ->execute([$id, $nickname]);
        return $result;
    }

    public static function addListenSong($conn, $nickname, $id, $duration)
    {
        $result = $conn
            ->prepare("INSERT INTO `listen_songs`(`id_song`, `nickname`, `duration`) VALUES  (?,?,?);")
            ->execute([$id, $nickname, $duration]);
        return $result;
    }

    public static function removeFavouriteSong($conn, $nickname, $id)
    {
        $result = $conn
            ->prepare("DELETE FROM `liked_songs` WHERE id_song = (?) and nickname = (?);")
            ->execute([$id, $nickname]);
        return $result;
    }
}
