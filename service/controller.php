<?php

/**
* Control application
*/

class Controller {
	private $model;

	public function __construct($model){
		$this->model = $model;
	}

	public function get_prize($prizes) {
		$prize = shuffle($prizes);

		foreach ($prizes as $key => $prize) {}

		return $prize;
	}
}

?>