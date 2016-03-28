<?php 
	include 'RfidController.php';

	$modelName = $_POST['modelName'];	
	$rC = new RfidController();
	$model = $rC->getNewModel();
	$model->deleteModel($modelName);
?>