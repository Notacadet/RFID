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
		$sql = "SELECT users.userName, nomenclature.nomenclature_Name, locations.roomNumber, makes.makeName, models.model_Name, items.rfid, items.serialNum, items.comments, items.accountedFor, items.dateAcquired, items.price, items.pbhrNumber, items.alias, items.HandRecieptSignDate, items.itemStatus, items.last_calibration, items.calibration_due FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join nomenclature on nomenclature.nomenclature_id=models.nom_id join makes on models.make_id=makes.make_id join users on users.user_id=items.hrholder_id WHERE userName like '%$selectedName%' ORDER BY rfid, nomenclature_Name, roomNumber, makeName, model_name";
		$result = $conn->query($sql);
		if (!$result){
			die("Didn't work" . mysqli_error($conn));
		}
		// Headers for the file
		 fputcsv($file, array('RFID', 'Nomenclature', 'Location','Last Seen','State','State Last','Barcode','Make','Model','Serial Number','HR Holder','Comments','Computer Name','Last Cal','Cal Due','Acq Date','Price','PB HR/LIN','HR Signed'));
		// Place the data in the file 
		if ($result->num_rows > 0){
					// output data of each row
					while($row = $result->fetch_assoc()) {
						fputcsv($file, array($row["rfid"],$row["nomenclature_Name"],$row["roomNumber"],$row["accountedFor"],"itemstatus",$row["itemStatus"],$row["serialNum"],$row["makeName"],$row["model_Name"],$row["serialNum"],$row["userName"],$row["comments"],$row["alias"],$row["last_calibration"],$row["calibration_due"],$row["dateAcquired"],$row["price"],$row["pbhrNumber"],$row["HandRecieptSignDate"]));
					}
				}  
		  

		fclose($file);  
	}
}
//$testObject = new XCSV();

//$testObject->createCSV('Kyle.Moses@usma.edu');
?>