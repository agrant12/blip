<?php 
/**
* Configuration File for Blip contest
*/

//Facebook Application Variables
$app_id = '369940546503928';
$app_secret = 'b49acd0336126391576c2ef22bed29cc';
$my_url = 'http://alvin.blip.com/';

//Database Variables
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blip";

require_once 'service/database.php';

//Check if database exists
$database = new Database($servername, $username, $password, $dbname);
$database->create_db();

?>