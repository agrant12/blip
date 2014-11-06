<?php

class Database {

	public function __construct(){}

	/**
	* Insert data into user table
	*/
	public function insert() {
		// Connect to Database and insert data
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "blip";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO user (prize_id, prize, session)
		VALUES ('prize_id', 's', 'f')";

		if ($conn->query($sql) === TRUE) {
			
		} else {
			echo $conn->error;
		}

		$conn->close;
	}

	/**
	* Read data from users table
	*/
	public function read() {
		// Connect to Database and insert data
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "blip";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, firstname, lastname FROM users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
			}
		} else {
			echo "0 results";
		}

		$conn->close();

	}

	/**
	* Download results as a CSV
	*/
	public function download() {

	}
}



?>