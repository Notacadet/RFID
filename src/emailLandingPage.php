<?php

	include 'handReceipt.php';
	include 'RfidController.php';

		
	//isset($_GET['fn']!=="John Doe" )
	$name=$_GET['fn'];
	//Get the userName (email) based off of first and last name
	
	$conn = RfidController::connect(); 
	$sName = "SELECT userName FROM users WHERE user_id= '$name'";
	$result = $conn->query($sName);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
				$holder=$row["userName"];
		};
	};
	echo $holder;
        		
        		
	$testObject = new handReceipt();
	$testObject->createHR($holder);
	
?>