<?php
/* Process Submission */

class Prize {

	public function __construct() {}

	public function get_prize($name) {
		$winner = array();

		// Possible Prizes
		$prizes = array(
			0 => 'Sorry you are not a winner.',
			1 => 'T-Shirt',
			2 => 'Cap',
			3 => 'Music Download'
		);

		$prizes_id = array(
			'Sorry you are not a winner.' => '0',
			'T-Shirt' => '1',
			'Cap' => '2',
			'Music Download' => '3'
		);

		shuffle($prizes);

		foreach ($prizes as $key => $prize) {}

		$winners = '<?xml version="1.0" encoding="UTF-8"?>' .
					'<winner>' .
						'<prize>' . $prize . '</prize>' .
						'<prize_id>' . $prizes_id[$prize] . '</prize_id>' .
						'<name>' . $name . '</name>' .
					'</winner>';

		if ($prizes_id[$prize] != 0) {
			$html = 'Congratulations ' . $name . '! You have won a ' . $prize . '.';
			$html .= 'Redeem your prize by logging into Facebook.';
			$html .= '<form action="process.php">' .
						'<input type="submit" name="submit" value="Redeem" />' .
					'</form>';
			echo $html;
		} else {
			echo $prize;
		}

		return simplexml_load_string($winners);
	}
}

?>