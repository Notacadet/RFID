<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	
	
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$prof = $rC->selectProfile();
	//$prof->generateNewProfileForm();
	//need to add the capability to show all profiles upon landing on this page and a link back to profilepage.php
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();	

	
?>