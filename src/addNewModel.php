<?php 
	include 'RfidController.php';

	$modelName = $_POST['modelName'];	
	$makeName = $_POST['makeName'];
	$nomName = $_POST['nomName'];
	$rC = new RfidController();
	$model = $rC->getNewModel();
	$model->insertModel($modelName,$makeName,$nomName);
?>