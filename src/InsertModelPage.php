<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$model = $rC->getNewModel();
	$model->generateNewModelForm();
?>


<?php
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
	
?>