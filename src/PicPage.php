<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

	$pic = $rC->getNewPicture();
	//$make->generateNewMakeForm();
	$pic->generateSelectPictureForm();
	//$make->generateSelectMakeForm();
	//$make->generateUpdateMakeForm();
	//$make->generateDeleteMakeForm();
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();

	
?>