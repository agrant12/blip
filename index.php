<?php 
	//Start Session
	session_start();

	//Include variables for app
	require_once 'config.php'; 
?>

<?php if (!empty($_REQUEST['code'])): ?>
	<?php 
		require_once 'service/facebook_token.php';
		require_once 'service/database.php';

		//Set variables using session to be inserted into database
		$name = htmlentities($_SESSION['name']);
		$facebook_id = htmlentities($_SESSION['facebook_id']);
		$prize = htmlentities($_SESSION['prize']);
		$prize_id = htmlentities($_SESSION['prize_id']);

		//Create Database Object and insert data
		$database = new Database($servername, $username, $password, $dbname);
		$database->insert($prize, $prize_id, $facebook_id, $name);
	?>
<?php elseif ( isset($_GET['submit'])): ?>
	<?php 
		//Set Global Request
		$_SESSION['name'] = $_GET['name'];

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




