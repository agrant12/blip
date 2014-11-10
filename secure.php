<?php
/**
* Secure page to view contest results
*/
require_once 'config.php';
/*require_once 'service/database.php';
$database = new Database($servername, $username, $password, $dbname);
$database->download();*/

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Name', 'Prize', 'Prize ID', 'Facebook ID'));

$conn = new mysqli($servername, $username, $password, $dbname);

$rows = $conn->query("SELECT name,prize,prize_id,facebook_id FROM user");

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);

?>