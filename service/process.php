<?php
/* Process Submission */

include 'controller.php';
include 'model.php';

class Process {

}
$model = new Model();
$controller = new Controller($model);

// Possible Prizes
static $prizes = array(
	0 => 'Sorry you are not a winner',
	1 => 'T-Shirt',
	2 => 'Cap',
	3 => 'Music Download'
);

echo $controller->get_prize($prizes);


?>