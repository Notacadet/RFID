<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$item = $rC->getNewItem();
	$item->generateNewItemForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();

	
?>