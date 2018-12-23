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
}

?>