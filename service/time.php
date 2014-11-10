<?php
/**
* Class to set time stamp for user entry
*/

class Time {

	private $timezone;

	public function __construct($timezone = '') {
		$this->$timezone = $timezone;
	}

	public function get_time() {
		echo date('r');
	}

	public function calc_time() {

	}
}

?>