<?php 
	include 'RfidController.php';

	$picID = $_POST['picID'];	
	$rC = new RfidController();
	$make = $rC->getNewPicture();
	$make->selectPicture($picID);
?>