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
	$sql = "SELECT nomenclature.nomenclature_Name, nomenclature.nomenclature_id from nomenclature WHERE nomenclature_id= '$name'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			$nomenclatureName=$row["nomenclature_Name"];
		}; 
	};
	echo "Nomenclature: ";
	echo $nomenclatureName;
	echo "<br/>";
        		
    $nomenclature= $rC-> getNewNomenclature();    		
	$nomenclature->createNomenclatureView($name);
	
?>