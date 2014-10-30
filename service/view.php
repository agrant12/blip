<?php 

/**
* View to dislay data
*/
class View {
	private $model;
	private $controller;

	public function __construct($controller,$model) {
		$this->controller = $controller;
		$this->model = $model;
	}

	public function output() {
		echo "<p><a href='mvc.php?action=clicked'" . $this->model->string . "</a></p>";
	}
}

?>