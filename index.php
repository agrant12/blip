<!DOCTYPE HTML>
<head>
	<title>Blippar Contest</title>
	<!--<script type="text/javascript" src="service/js/facebook.js"></script>-->
</head>
<body>

	<?php 
		//$accessToken = $_COOKIE['accessToken'];
		require_once 'service/facebook.php';

		$session = $_COOKIE['PHPSESSID'];

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
		<?php
			$POST['prize'] = $message['prize'];
			$prize_id = $message['id'];
			require_once 'service/database.php';
		?>
	<?php else: ?>
		<p><?php echo $message['prize']; ?> Please try again tommorrow.</p>
		<?php
			$POST['prize'] = $message['prize'];
			$prize_id = $message['id'];
			require_once 'service/database.php';
		?>
	<?php endif; ?>

</body>
</html>
