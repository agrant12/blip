<?php 

session_start();

require_once 'config.php';

$code = $_REQUEST['code'];

if (empty($code)) {

	$_SESSION['state'] = md5(uniqid(rand(), TRUE));

	//Retrieve User Token
	$ch = curl_init();

	$postData = array(
		'client_id' => $app_id,
		'redirect_uri' => $my_url,
		'state' => $_SESSION['state'],
		'display' => 'popup'
	);
 
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://www.facebook.com/dialog/oauth?',
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => $postData,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_FOLLOWLOCATION => TRUE
	));

	echo curl_exec($ch);

	//close curl
	curl_close($ch);
}

?>