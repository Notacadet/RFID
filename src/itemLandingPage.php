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
	$sql="SELECT nomenclature.nomenclature_Name, items.rfid, items.price, items.serialNum, items.items_id, makes.make_id, locations.roomNumber, locations.location_id, makes.makeName, models.model_Name, models.model_id, users.userName FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join nomenclature on nomenclature.nomenclature_id=models.nom_id join makes on models.make_id=makes.make_id join users on items.user_id=users.user_id where items_id='$name' order by roomNumber, makeName, model_name";
	$result = $conn->query($sql);
	if (!$result) {
	    printf("Error: %s\n", mysqli_error($con));
	    exit();
	}

	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$rfidNum=$row["rfid"];
			$roomNumber=$row["roomNumber"];
			$price=$row["price"];
			$make=$row["makeName"];
			$model=$row["model_Name"];
			$nomenclature=$row["nomenclature_Name"];
			$serialNum=$row["serialNum"];
			$hrHolder=$row["userName"];
			
		}; 
	};
	echo "RFID: ";
	echo $rfidNum;
	echo "<br/>";
	echo "Room Number: ";
	echo $roomNumber;
    echo "<br/>";
	echo "Name: ";
	echo $nomenclature;
	echo "<br/>";
	echo "Make: ";
	echo $make;
	echo "<br/>";
	echo "Model: ";
	echo $model;
	echo "<br/>";
	echo "Serial Nubmer: ";
	echo $serialNum;
	echo "<br/>";
	echo "HR Holder: ";
	echo $hrHolder;
	echo "<br/>";
	echo "Price: ";
	echo $price;
	echo "<br/>";
    		
?>