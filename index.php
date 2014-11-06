<?php 
	session_start(); 
	require_once 'config.php';
	require_once 'service/facebook_login.php';
?>

<!DOCTYPE HTML>
<head>
	<title>Blippar Contest</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<?php if ($user_id && $user_name): ?>
	<?php 
		try {
			require_once 'service/prize.php';
			$prize = new Prize();
			$message = $prize->get_prize();
		} catch (Exception $e) {
			echo 'There was an error. Please try again.';
		}
	?>

	<?php if ($message['id'] != 0): ?>
		<p>Congratulations! You have won a <?php echo $message['prize']; ?>!</p>
		<p>View All Winners: <button>Winners</button></p>
		<?php
			$POST['prize'] = $message['prize'];
			$prize_id = $message['id'];

			//Insert Data
			require_once 'service/database.php';
			$database = new Database();
			$database->insert();
		?>
	<?php else: ?>
		<p><?php echo $message['prize']; ?> Please try again tommorrow.</p>
		<?php
			$POST['prize'] = $message['prize'];
			$prize_id = $message['id'];
			
			//Insert Data
			require_once 'service/database.php';
			$database = new Database();
			$database->insert();
		?>
	<?php endif; ?>
<?php else: ?>
	<p>Please login in to win: <a href="<?php echo func();?>">Login</a></p>
<?php endif; ?>


