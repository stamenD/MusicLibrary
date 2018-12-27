<?php
class Song
{
	private $id;
	private $title;
	private $added_at;
	private $artist;
	private $genre;


	function __construct($id, $title, $added_at, $artist, $genre)
	{
		$this->id = $id;
		$this->title = $title;
		$this->added_at = $added_at;
		$this->artist = $artist;
		$this->genre = $genre;
		# code...
	}

	public static function getAllSongs($conn){
		$result = $conn->query("SELECT * FROM `songs`;");
		return $result;
	}
	public static function loadAllSongsInDB(){
		$conn = new PDO('mysql:host=localhost;dbname=project', 'root', '');
    	$files = scandir("../static");
    	for ($i = 0; $i < count($files); $i++) {
        	if (strpos($files[$i], ".mp3")) {
				$result =  $conn
				->prepare( "
					INSERT INTO `songs`(`title`, `genre`, `artist`) VALUES (?,?,?);")
				->execute([$files[$i],"unknown","unknown"]);
			}
		}

	}
	public static function getSongById($conn, $id){
		$result =  $conn->query( 'SELECT * FROM `songs` WHERE id = '. $id .';');
		return ($result->fetch())["title"];
	}

	public static function getMostListenSong($conn, $from){
		if(is_null($from)){
			$result =  $conn->query( 'SELECT id_song , SUM(duration) FROM `listen_songs` GROUP BY id_song ORDER BY SUM(duration) DESC LIMIT 1');
		}
		else{
			$result =  $conn->query( 'SELECT id_song , SUM(duration) FROM `listen_songs` WHERE nickname = "'. $from.'" GROUP BY id_song ORDER BY SUM(duration) DESC LIMIT 1');
		}
		if($result != false)
			return ($result->fetch())["id_song"];
		else
			return $result;
	}

	public static function getMostLikedSong($conn){
		$result =  $conn->query( 'SELECT id_song , COUNT(id_song) FROM liked_songs GROUP BY id_song');
		return $result;
	}
}

?>