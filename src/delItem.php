<?php 
	include 'RfidController.php';

	$rfid = $_POST['rfid'];	
	$rC = new RfidController();
	$item = $rC->getNewItem();
	$item->deleteItem($rfid);
?>