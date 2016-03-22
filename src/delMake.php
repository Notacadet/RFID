<?php 
	include 'RfidController.php';

	$makeName = $_POST['makeName'];	
	$rC = new RfidController();
	$make = $rC->getNewMake();
	$make->deleteMake($makeName);
?>