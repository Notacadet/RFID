<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	$prof = $rC->getNewProf();
	$prof->generateNewProfileForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();	
?>