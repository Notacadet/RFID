<?php

class XCSV{
	
	public function createCSV($selectedName){

		// output headers so that the file is downloaded rather than displayed
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=HRdata.csv');

		// create a file pointer connected to the output stream
		$file = fopen('php://output', 'w');

		// Connect to the DB 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);

		// Fetch the data
		$sql = "SELECT users.userName, nomenclature.nomenclature_Name, locations.roomNumber, makes.makeName, models.model_Name, items.rfid, items.serialNum FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join nomenclature on nomenclature.nomenclature_id=models.nom_id join makes on models.make_id=makes.make_id join users on users.user_id=items.hrholder_id WHERE userName like '%$selectedName%'";
		$result = $conn->query($sql);

		// Headers for the file
		fputcsv($file, array('Nomenclature', 'Count', 'Location','Make','Model','Serial Number','RFID'));
		// Place the data in the file 
		if ($result->num_rows > 0){
					// output data of each row
					while($row = $result->fetch_assoc()) {
						fputcsv($file, array($row["nomenclature_Name"], "Count Holder",$row["roomNumber"], $row["makeName"], $row["model_Name"], $row["rfid"], $row["serialNum"]));
					}
				} 
		  

		fclose($file);  
	}
}
$testObject = new XCSV();

$testObject->createCSV('Kyle.Moses@usma.edu');
?>