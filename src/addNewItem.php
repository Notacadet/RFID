<?php 
	include 'RfidController.php';

	$rfid = $_POST['rfid'];
	$model_Name = $_POST['model_Name'];	
	$location = $_POST['roomNumber'];
	$serial = $_POST['serialNum'];
	$comments = $_POST['comments'];
	$price = $_POST['price'];	
	$hrHolder = $_POST['userName'];
	$rC = new RfidController();
	$item = $rC->getNewItem();
	$item->insertItem($rfid,$model_Name, $location, $serial, $comments,$price ,$hrHolder);
?>