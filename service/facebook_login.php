<?php
	$code = $_REQUEST['code'];

	if (empty($code)) {
		$_SESSION['state'] = md5(uniqid(rand(), TRUE));

		$dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
		. $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
		. $_SESSION['state'];

		echo("<script> top.location.href='" . $dialog_url . "'</script>");
	}

	/*if($_REQUEST['state'] == $_SESSION['state']) {

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

		//close curl
		curl_close($ch);
	}*/
	if ($_REQUEST['state'] == $_SESSION['state']) {
		
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
		
		$user_id = $winner->id;
		$user_name = $winner->name;

		// Close connections
		curl_close($ch);
		curl_close($user);
	}
	
?>