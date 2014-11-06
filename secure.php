<?php
/**
* Secure page to view contest results
*/
session_start();

require_once 'service/database.php';

$database = new Database();
$database->read();

?>