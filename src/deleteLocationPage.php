<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$location = $rC->getNewLocation();
	$location->generateDeleteLocationForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();

	
?>