<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	$rfid = $rC->getNewRfid();	
	$rfid->generateSelectrfidForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();	
	
?>