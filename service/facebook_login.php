<?php

$code = $_REQUEST['code'];

if (empty($code)) {
	$_SESSION['state'] = md5(uniqid(rand(), TRUE));

	//$dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
	//. $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
	//. $_SESSION['state'] . 'display=popup';

	//echo("<script> top.location.href='" . $dialog_url . "'</script>");
	$ch = curl_init();

	$postData = array(
		'client_id' => '369940546503928',
		'redirect_uri' => $my_url,
		'state' => $_SESSION['state']
	);
 
	curl_setopt_array($ch, array(
		CURLOPT_URL => 'https://www.facebook.com/dialog/oauth?',
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_POST => 0,
		CURLOPT_POSTFIELDS => $postData,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_REFERER => "http://alvin.blip.com",
		CURLOPT_FOLLOWLOCATION => TRUE
	));

	echo curl_exec($ch);

	//close curl
	curl_close($ch);
} else {
	$html = 'Please try refreshing the page or closing and re-opening your browser window.';
	echo $html;
}

	
	
?>