<?php

// Connect to Database and insert data
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blip";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (prize_id, prize)
VALUES ($prize_id, $prize)";

if ($conn->query($sql) === TRUE) {
	echo 'Success';
} else {
	echo 'Fail';
}

$conn->close;



?>