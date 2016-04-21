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
	$sql = "SELECT locations.roomNumber, locations.location_id FROM locations where location_id= '$name'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
				$room=$row["roomNumber"];
		}; 
	};
	echo "Room Number: ";
	echo $room;
	echo "<br/>";
        		
    $location = $rC-> getNewLocation();    		
	$location->createLocationView($name);
	
?>