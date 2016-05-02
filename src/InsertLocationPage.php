<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	$location = $rC->getNewLocation();
	$location->generateNewLocationForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
?>