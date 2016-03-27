<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	
	$make = $rC->getNewMake();
	$model = $rC->getNewModel();
	$nom = $rC->getNewNomenclature();
	
	$make->generateNewMakeForm();
	$model->generateNewModelForm();
	$nom->generateNewNomForm();
	
	$make->generateSelectMakeForm();
	$model->generateSelectModelForm();
	$nom->generateSelectNomForm();
	
	$make->generateDeleteMakeForm();
	$model->generateDeleteModelForm();
	$nom->generateDeleteNomForm();
	
	//$make->generateUpdateMakeForm(); don't need to ever do this to makes
	//$model->generateUpdateModelForm(); don't need to ever do this to models until we incorporate pictures.
	//$nom->generateUpdateNomForm(); don't need to ever do this
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
?>