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


//Time Zone
$timezone = date_default_timezone_set('America/New_York');
require_once 'service/time.php';
$time = new Time($timezone);

//Check if database exists, then create if not
require_once 'service/database.php';
$database = new Database($servername, $username, $password, $dbname);
$database->create_db();

?>