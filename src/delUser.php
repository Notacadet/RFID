<?php 
	include 'RfidController.php';

	$userName = $_POST['userName'];	
	$rC = new RfidController();
	$user = $rC->getNewUser();
	$user->deleteUser($userName);
?>