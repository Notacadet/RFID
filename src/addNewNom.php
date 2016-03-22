<?php 
	include 'RfidController.php';

	$nomName = $_POST['nomName'];	
	$rC = new RfidController();
	$nom = $rC->getNewNomenclature();
	$nom->insertNomenclature($nomName);

?>