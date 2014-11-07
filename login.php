<?php 

	session_start(); 

	$code = $_REQUEST['code'];

	require_once 'config.php';
	require_once 'service/facebook_token.php';

	if (!empty($_SESSION['facebook_id'])) {

		//Set variables using session to be inserted into database
		$name = htmlentities($_SESSION['name']);
		$facebook_id = htmlentities($_SESSION['facebook_id']);
		$prize = htmlentities($_SESSION['prize']);
		$prize_id = htmlentities($_SESSION['prize_id']);

		//Insert Data to MySql
		require_once 'service/database.php';
		$database = new Database($servername, $username, $password, $dbname);
		$insert = $database->insert($prize, $prize_id, $facebook_id, $name);

		if ($insert == TRUE) {
			$button = 'Thank you for playing ' . $name . '!';
			$button .= '<a href="secure.php">See All Winners</a>';
			echo $button;
		}
	}

?>
