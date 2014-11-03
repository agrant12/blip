<?php
	require_once('vendor/facebook/php-sdk-v4/autoload.php');

	use Facebook\FacebookSession;
	use Facebook\FacebookRequest;

	FacebookSession::setDefaultApplication('369940546503928', 'b49acd0336126391576c2ef22bed29cc');

	// If you're making app-level requests:
	$session = FacebookSession::newAppSession();
	$token = $session->getToken();

	//$session = new FacebookSession($access_token);

	try {
		$request = (new FacebookRequest($session, 'GET', '/me'))->execute();
		$object = $response->getGraphObject();
		echo $object->getProperty('name');
	} catch (FacebookRequestException $ex) {
		// Session not valid, Graph API returned an exception with the reason.
		echo $ex->getMessage();
	} catch (Exception $ex) {
		// Graph API returned info, but it may mismatch the current app or have expired.
		echo $ex->getMessage();
		//var_dump('expression');
	}


?>