<?php
	//Initiate Curl Requests
	$ch = curl_init();
	$user = curl_init();

	$postData = array(
		'client_id' => $app_id,
		'redirect_uri' => $my_url,
		'client_secret' => $app_secret,
		'code' => $_GET['code']
	);

	//Get User Access Token
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://graph.facebook.com/oauth/access_token?',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $postData,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_FOLLOWLOCATION => true
	));

	$access_token = preg_split("/[=&]+/", curl_exec($ch));
	$access_token = $access_token[1];

	//Get User Info
	$getData = array(
		'access_token' => $access_token
	);

	curl_setopt_array($user, array(
		CURLOPT_URL => 'https://graph.facebook.com/me?access_token=' . $access_token,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
	));

	$winner = json_decode(curl_exec($user));

	$facebook_id = $winner->id;

	// Close connections
	curl_close($ch);
	curl_close($user);
?>