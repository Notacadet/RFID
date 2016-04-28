<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$user = $rC->getNewUser();
	$user->generateDeleteUserForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();

	
?>