<?php
	$ch = curl_init();

	$postData = array(
		'client_id' => '369940546503928',
		'client_secret' => 'b49acd0336126391576c2ef22bed29cc',
		'grant_type' => 'client_credentials',
		'redirect_uri' => 'http://alvingrant.com',
		'testcookie' => '1'
	);
 
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://graph.facebook.com/oauth/access_token?',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $postData,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_FOLLOWLOCATION => true
	));

	$access_token = preg_split("/[=]+/", curl_exec($ch));
	$access_token = $access_token[1];

	echo $access_token;

	$getData = array(
		'fields' => 'about',
		'access_token' => $access_token
	);

	//close curl
	curl_close($ch);
	
?>