<?php
	session_start();

	require_once('../vendor/facebook/php-sdk-v4/autoload.php');

	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;

	FacebookSession::setDefaultApplication('369940546503928', 'b49acd0336126391576c2ef22bed29cc');

	$helper = new FacebookRedirectLoginHelper('http://alvin.blip.com/service/login.php');

	try {
		$session = $helper->getSessionFromRedirect();
	} catch (FacebookRequestException $e) {
		echo $e;
	} catch (Execption $ex) {
		echo $ex;
	}

	if ( isset( $session ) ) {
		// graph api request for user data
		$request = new FacebookRequest( $session, 'GET', '/me' );
		$response = $request->execute();
		// get response
		$graphObject = $response->getGraphObject();

		// print data
		echo  print_r( $graphObject, 1 );
	} else {
		// show login url
		echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
	}
?>