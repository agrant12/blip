<?php 
	session_start();

	require_once 'config.php';
?>

<?php if (!empty($_REQUEST['code'])): ?>
	<?php 
		require_once 'service/facebook_token.php';
		
		if (!empty($facebook_id)) {
			require_once 'service/database.php';

			//Set variables using session to be inserted into database
			$name = htmlentities($_SESSION['name']);
			$prize = htmlentities($_SESSION['prize']);
			$prize_id = htmlentities($_SESSION['prize_id']);
			
			// Get Time 
			$date = new DateTime();
			$DateOfRequest = (string)$date->format('Y-m-d H:i:s');
			//Create Database Object and insert data
			$database = new Database($servername, $username, $password, $dbname);
			$database->insert($prize, $prize_id, $facebook_id, $name, $DateOfRequest);

			$html = 'View winners: ';
			$html .= '<a href="secure.php">Winners</a>';

			echo $html;
		}
	?>
<?php elseif (isset($_REQUEST['submit'])): ?>
	<?php 
		//Set Global Request
		$_SESSION['name'] = $_GET['name'];
		$_SESSION['unique_id'] = md5(uniqid(rand(), TRUE));
		
		require_once 'service/prize.php';

		//Retrieve Prize
		if ($_SESSION['name']) {
			$name = htmlentities($_SESSION['name']);
			$prize = new Prize();
			$message = $prize->get_prize($name);

			$_SESSION['prize'] = (string)$message->prize;
			$_SESSION['prize_id'] = (string)$message->prize_id;
			$_SESSION['name'] = (string)$message->name;
		}
	?>
<?php else: ?>
	<form action="" method="get">
		<labels>Name:</label><input type="text" name="name" required="required" />
		<input type="submit" name="submit" value="send"></input>
	</form>
<?php endif; ?>