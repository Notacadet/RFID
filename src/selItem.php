<?php 
	include 'RfidController.php';
	$rfid = $_POST['rfid'];
	$serialNum = $_POST['serial'];
	$roomNumber = $_POST['location'];
	$rC = new RfidController();
	$item = $rC->getNewItem();
	$item->selectItem($rfid,$serialNum,$roomNumber);
?>