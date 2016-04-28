<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$make = $rC->getNewMake();
	$make->generateDeleteMakeForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
	
?>