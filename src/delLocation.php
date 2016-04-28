<?php 
	include 'RfidController.php';

	$roomNumber = $_POST['roomNumber'];	
	$rC = new RfidController();
	$location = $rC->getNewLocation();
	$location->deleteLocation($roomNumber);
?>