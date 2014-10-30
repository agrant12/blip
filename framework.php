<?php

/**
* Model to store data
*/
class Model {

	public $string;
	
	public function __construct() {
		$this->string = 'PHP Framework';
	}
}

/**
* View to dislay data
*/
class View {

	private $model;
	private $controller;

	public function __construct($model, $controller) {
		$this->model = $model;
		$this->controller = $controller;
	}
}

/**
* Control application
*/
class Controller {
	
	public function __construct($model) {
		$this->model = $model;
	}
}

?>