<!DOCTYPE HTML>
<head>
	<title>Blippar Contest</title>
	<!--<script type="text/javascript" src="service/js/facebook.js"></script> -->
</head>
<body>
	<?php 
		include './vendor/autoload.php';
		FacebookSession::setDefaultApplication('369808103183839', '42874825214206b4c6e56ef7a2dbb669'); 
		$helper = new FacebookRedirectLoginHelper('your redirect URL here');
		$loginUrl = $helper->getLoginUrl();
	?>
	
	<!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
	</fb:login-button> -->

</body>
</html>
