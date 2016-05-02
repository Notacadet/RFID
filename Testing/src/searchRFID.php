<?php

class searchRFID implements RFIDDAO
{
	public function selectRFID($inrfid, $inSerial){
		$conn = RfidController::connect();
		$sql = "SELECT items.rfid, items.serialNum, locations.roomNumber, makes.makeName, models.model_name FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id where rfid like '%$inrfid%' and serialNum like '%$inSerial%'";
		//$sql = "SELECT * from 'makes'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "<table><tr><th>RFID</th><th>Serial Number</th><th>Location</th><th>Make</th><th>Model</th></tr>";
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "<tr><td>" . $row["rfid"]. "</td><td>" . $row["serialNum"]. "</td><td>" . $row["roomNumber"]."</td><td>". $row["makeName"]."</td><td>". $row["model_name"]. "</td></tr>";
    		}
    		echo "</table>";
		} 
		else {
    		echo "0 results";
		}
		$conn->close();
	}			
}	