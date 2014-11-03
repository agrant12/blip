<?php
/* Process Submission */

class Prize {

	public function __construct() {}

	public function get_prize() {
		$winner = array();
		
		// Possible Prizes
		$prizes = array(
			0 => 'Sorry you are not a winner.',
			1 => 'T-Shirt',
			2 => 'Cap',
			3 => 'Music Download'
		);

		$prizes_id = array(
			'Sorry you are not a winner' => 0,
			'T-Shirt' => 1,
			'Cap' => 2,
			'Music Download' => 3
		);

		shuffle($prizes);

		foreach ($prizes as $key => $prize) {}

		$winner['id'] = $prizes_id[$prize];
		$winner['prize'] = $prize;

		return $winner;
	}
}

?>