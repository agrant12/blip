<?php 

	session_start(); 
	//Get Redirect link
	$redirect = $_REQUEST['next'];

	if (!empty($redirect)) {
		echo("<script> top.location.href='" . $redirect . "'</script>");
	}
	
?>
