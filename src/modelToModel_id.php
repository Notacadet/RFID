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
	$sql = "SELECT makes.makeName, models.model_name, models.model_id, nomenclature.nomenclature_Name FROM models join makes on models.make_id=makes.make_id join nomenclature on models.nom_id=nomenclature.nomenclature_id WHERE model_id= '$name'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
				$model_name=$row["model_name"];
				$makeName=$row["makeName"];
				$nomenclature_Name=$row["nomenclature_Name"];
		}; 
	};
	echo "Model Name: ";
	echo $model_name;
	echo "<br/>";
	echo "Make Name: ";
	echo $makeName;
	echo "<br/>";
	echo "Nomenclature: ";
	echo $nomenclature_Name;
	echo "<br/>";
        		
    $model = $rC-> getNewModel();    		
	$model->createModelView($name);
	
?>