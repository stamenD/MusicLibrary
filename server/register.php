<?php
// var_dump(json_decode(file_get_contents("php://input"), true));


$conn  = new PDO('mysql:host=localhost;dbname=project', 'root', '');
echo "<br>";
if(is_null(json_decode(file_get_contents("php://input"), true) )){
	$current_information = $_POST;
	}
else{
	$current_information = json_decode(file_get_contents("php://input"), true);
}
$errors = '';
if ($_POST) {

	if (!array_key_exists('nickname', $current_information) || strlen($current_information['nickname'])==0) {
        $errors = $errors . "Потребителското име трябва да е поне 3." . '<br>';
    } elseif (strlen($current_information['nickname']) > 10 ) {
        $errors = $errors . "Потребителското име трябва да е най-много 10." . '<br>';
    }else{
    	$current_information['nickname'] = $current_information['nickname'];
    }

	if (!array_key_exists('passwordFirst', $current_information) || strlen($current_information['passwordFirst'])<6) {
        $errors = $errors . "Паролата трябва да се състои поне от 6 символа." . '<br>';
    }else{
    	preg_match('/[A-Z]/', $current_information['passwordFirst'], $matches1, PREG_OFFSET_CAPTURE);
    	preg_match('/[a-z]/', $current_information['passwordFirst'], $matches2, PREG_OFFSET_CAPTURE);
    	preg_match('/[0-9]/', $current_information['passwordFirst'], $matches3, PREG_OFFSET_CAPTURE);
    	if (empty($matches1) || empty($matches2) || empty($matches3)) {
        	$errors = $errors . "Паролата трябва да има поне 1 главна, 1 малка буква и 1 цифра." . '<br>';
 	    }else{
    		$current_information['passwordFirst'] = $current_information['passwordFirst'];
    	}
    }

	if (!array_key_exists('passwordSecond', $current_information) || $current_information['passwordSecond']!=$current_information['passwordFirst']) {
        $errors = $errors .  "Парола втори път - трябва да съвпадат." . '<br>';
    }

    
    if (strlen($errors) > 0) {
        // echo 'ERRORS:'.'<br>' . $errors;
		echo "<br>";
    }
    else
	{

		foreach ($current_information as $key => $value) {
				echo $key . " : " . $value . "<br>";
		}
		echo "<br>";
		echo "<br>";

		$stmt2 = $conn->query("ALTER TABLE users ADD created_at  datetime DEFAULT CURRENT_TIMESTAMP;");
		$a1 = $current_information['nickname'];
		$a2 =  password_hash($current_information['passwordFirst'], PASSWORD_DEFAULT);

        $result = $conn->query("SELECT * FROM `users`;");
        while ($row = $result->fetch()) {
            if($row["nickname"]==$a1){
                echo "Name: " . $row["nickname"]. "<br>";
                header("Location: ../?info=true");
                die();  
            }
        }

        $conn
        ->prepare( "INSERT INTO `users` (`nickname`, `password`) VALUES (?,?);")
        ->execute([$a1, $a2]);
        header("Location: ../views/login.php");
        die();	
    }
}



?>
