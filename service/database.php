<?php
/**
* Database Class
* Insert, Read, Create
*/

class Database {

	private $servername;
	private $username;
	private $password;
	private $dbname;

	public function __construct($servername = '', $username = '', $password = '', $dbname = ''){
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
	}

	/**
	* Insert data into user table
	*/
	public function insert($prize, $prize_id, $facebook_id, $name) {
		$html = '';

		//Check that values are present
		if (empty($prize) && empty($prize_id) && empty($facebook_id) && empty($name)) return;
		
		// Connect to Database and insert data
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		//Make sure same user is unable to play twice with a 25 hour period
		$sql = "SELECT * FROM user WHERE facebook_id='$facebook_id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($facebook_id == $row['facebook_id']) {
					echo 'Sorry 1 entry per day. Please try again tommorow.';
					break;
				}
			}
		} else {
			$sql = "INSERT INTO user (prize, prize_id, facebook_id, name)
			VALUES ('$prize', '$prize_id', '$facebook_id', '$name')";

			if ($conn->query($sql) === TRUE) {

				$xml = '<?xml version="1.0" encoding="UTF-8"?>' .
						'<entry>' .
							'<prize>' . $prize . '</prize>' .
							'<prize_id>' . $prizes_id[$prize] . '</prize_id>' .
							'<facebook_id>' . $facebook_id . '</facebook_id>' .
						'</entry>';

				$html = "Data entry successful: " . $xml;

			} else {
				echo $conn->error;
			}
		}

		//Close connection
		$conn->close;
		return $html;
	}

	/**
	* Read data from users table
	*/
	public function read() {
		// Connect to Database and insert data

		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM user WHERE prize_id != 0";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br><strong>Name:</strong> ". $row["name"] . " <strong>Prize:</strong> " . $row["prize"] . " <strong>Prize ID:</strong> ". $row["prize_id"]. " <strong>User ID:</strong> " . $row["facebook_id"] . "<br>";
			}
		} else {
			echo "0 results";
		}

		//Close connection
		$conn->close();
	}

	/**
	* Create Database
	*/
	public function create_db() {

		$conn = new mysqli($this->servername, $this->username, $this->password);

		// Create database
		$sql = 'CREATE DATABASE ' . $this->dbname;
		
		if ($conn->query($sql) == FALSE) {

		} else {
			$conn->close();
			$this->create_table();
		}
	}

	public function create_table() {
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		$table = "CREATE TABLE `user` (
			`id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`prize` varchar(255) NOT NULL,
			`prize_id` varchar(255) NOT NULL,
			`facebook_id` varchar(255) NOT NULL,
			`entry_time` datetime DEFAULT NULL,
			`name` varchar(255) NOT NULL
			)";
		
		if ($conn->query($table) === TRUE) {

		} else {
			echo "Error creating table: " . $conn->error;
		}

		//Close connection
		$conn->close();
	}
}



?>