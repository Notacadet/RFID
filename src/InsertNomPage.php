<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	$nom = $rC->getNewNomenclature();
	$nom->generateNewNomForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
?>