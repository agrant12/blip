<!DOCTYPE HTML>
<head>
	<title>Blippar Contest</title>
	<!--<script type="text/javascript" src="service/js/facebook.js"></script> -->
</head>
<body>
	<?php 

		try {
			require_once 'service/prize.php';
			$prize = new Prize();
			$message = $prize->get_prize();
		} catch (Exception $e) {
			echo 'There was an error. Please try again.';
		}

	?>

	<?php if ($message != 'Sorry you are not a winner'): ?>
		<p>Congratulations! You have won a <?php echo $message; ?>!</p>
		<form action="service/process.php">
			<button>Redeem Prize</button>
		</form>
	<?php else: ?>
		<p><?php echo $message; ?></p>
	<?php endif; ?>
	
	<!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button> -->

</body>
</html>
