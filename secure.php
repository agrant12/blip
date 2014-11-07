<?php
/**
* Secure page to view contest results
*/

session_start(); 

require_once 'config.php';
require_once 'service/database.php';
$database = new Database($servername, $username, $password, $dbname);
$database->read();


?>