<?php

	include 'RfidController.php';

	$rC = new RfidController();	
	//isset($_GET['fn']!=="John Doe" )
	$name=$_GET['fn'];
	//Get the userName (email) based off of first and last name
	//$split=explode(" ",$name);
	//$fName=$split[0];
	//$lName=$split[1];
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	$conn = RfidController::connect(); 
	$sql = "SELECT makes.makeName, makes.make_id from makes WHERE make_id= '$name'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
				$makeName=$row["makeName"];
		}; 
	};
	echo "Make Name: ";
	echo $makeName;
	echo "<br/>";
        		
    $make = $rC-> getNewMake();    		
	$make->createMakeView($name);
	
?>