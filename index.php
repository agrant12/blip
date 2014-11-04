<?php 
	include 'includes/header.php';
	session_start();
?>

<body>
	<section>
		<h4>Welcome to my contest!</h4>
		<p>Click button to enter.</p>
		<button>Enter Contest</button>
	</section>

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

<?php include 'includes/footer.php'; ?>
