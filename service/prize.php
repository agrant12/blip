<?php
/* Process Submission */

class Prize {

	public function __construct() {}

	public function get_prize() {

		// Possible Prizes
		$prizes = array(
			0 => 'Sorry you are not a winner',
			1 => 'T-Shirt',
			2 => 'Cap',
			3 => 'Music Download'
		);

		shuffle($prizes);

		foreach ($prizes as $key => $prize) {
			# code...
		}

		return $prize;
	}
}

?>