<?php 
	include 'RfidController.php';

	$nomName = $_POST['nomName'];	
	$rC = new RfidController();
	$nom = $rC->getNewNomenclature();
	$nom->selectNomenclature($nomName);

?>