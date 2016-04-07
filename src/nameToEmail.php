<?php

	include 'handReceipt.php';
	include 'RfidController.php';

		
	//isset($_GET['fn']!=="John Doe" )
	$name=$_GET['fn'];
	echo $name;
	//Get the userName (email) based off of first and last name
	$split=explode(" ",$name);
	$fName=$split[0];
	$lName=$split[1];
	
	$conn = RfidController::connect(); 
	$sName = "SELECT userName FROM users WHERE firstNAme=".$fName." and lastName=".$lName;
	echo $sName;
	$result = $conn->query($sName);

	$testObject = new handReceipt();
	$testObject->createHR($result);
	
?>