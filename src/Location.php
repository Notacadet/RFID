<?php 
//include_once 'RfidController.php';

class Location{
	
	public function generateNewLocationForm(){
		print(" <br><br><br><form action = addNewLocation.php method=post>
			New Location: <input name=roomNumber type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateSelectLocationForm(){
		print(" <form action = selMake.php method=post>
			Select Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdateLocationForm(){
		print(" <form action = upMake.php method=post>
			Update Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeleteLocationForm(){
		print(" <form action = delMake.php method=post>
			Delete Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}		
	//CRUD Sequence for Make
	public function insertLocation($roomNumber){
		$conn = RfidController::connect();//THIS WORKS
		$check=mysqli_query($conn, "select * from locations where roomNumber='$roomNumber'");
		$checkrows=mysqli_num_rows($check);
		if($checkrows>0){
			echo "Room Number Exists";
		}
		else{
			$sql = "INSERT INTO locations( roomNumber, created_at, updated_at, delete_Boolean) VALUES ('$roomNumber',CURDATE(),CURDATE(),'0')";
			$result = $conn->query($sql) or die ('Error entering room number');
			$conn->close();
			echo "Room Number Added";
		}
		
	}
	public function selectLocation($inMake){
		//
		$conn = RfidController::connect();
		$sql = "SELECT make_id,makeName,created_at,updated_at FROM makes WHERE delete_Boolean = '0' AND makeName like '$inMake%'";
		//$sql = "SELECT * from 'makes'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "makeID: " . $row["make_id"]. " - makeName: " . $row["makeName"]. " Created:" . $row["created_at"]."Updated:". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}	
		$conn->close();
	}
		/*public function updateMake($inMake){ //don't need this capability yet
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE makes SET updated_at = CURDATE() WHERE makeName = $inMake";
		$conn->query($sql);
		echo "Success";
	}*/
	public function deleteLocation($inLocation){//not functional until we add the delete fields to the tables 
		$conn = RfidController::connect();
		$sql = "UPDATE locations SET delete_Boolean = '1', updated_at = CURDATE() WHERE roomNumber = '$inLocation'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	public function createLocationView($selectedLocation){

		$conn = RfidController::connect();
		$sql = "SELECT items.rfid, items.items_id, items.serialNum, makes.make_id, nomenclature.nomenclature_id, nomenclature.nomenclature_name, locations.roomNumber, makes.makeName, models.model_name, models.model_id, users.userName, users.user_id FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id join users on items.user_id=users.user_id join nomenclature on models.nom_id = nomenclature.nomenclature_id where locations.location_id = '$selectedLocation' order by nomenclature_name, makeName, model_name, serialNum";
		$result = $conn->query($sql);
		if (!$result) {
		    printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}
		echo "<table>
		<tr>
		<th>RFID</th>
		<th>Nomenclature</th>
		<th>Serial Number</th>
		<th>Make Name</th>
		<th>Model Name</th>
		<th>HR Holder</th>		
		</tr>";
		while($row = mysqli_fetch_array($result)) {
			$selectedModel=$row["model_id"];
			$selectedMake=$row["make_id"];
			$selectedItem=$row["items_id"];
			$selectedNom=$row["nomenclature_id"];
			$selectedUser=$row["user_id"];
		    echo "<tr>";
		    echo "<td><a href=itemLandingPage.php?fn=$selectedItem>" . $row['rfid'] . "</td>";
		    echo "<td><a href=nomLandingPage.php?fn=$selectedNom>" . $row['nomenclature_name'] . "</td>";
		    echo "<td>" . $row['serialNum'] . "</td>";
		    echo "<td><a href=makeLandingPage.php?fn=$selectedMake>" . $row['makeName'] . "</td>";
		    echo "<td><a href=modelToModel_id.php?fn=$selectedModel>" . $row['model_name'] . "</td>";
		    echo "<td><a href=emailLandingPage.php?fn=$selectedUser>" . $row['userName'] . "</td>";
		    echo "</tr>";
		}

		echo "</table>";
		echo "<br/>";
		$conn->close();
	}

}
?>