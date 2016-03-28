<?php

	include 'handReceipt.php';
		
	//isset($_GET['fn']!=="John Doe" )
	$name=$_GET['fn'];

	//Get the userName (email) based off of first and last name
	$split=explode(" ",$name);
	$fName=$split[0];
	$lName=$split[1]; 
	$sName = "SELECT userName FROM users WHERE firstName=$fName and lastName=$lName";
	
	$testObject = new handReceipt();
	$testObject->createHR("James Beck");
	
?>