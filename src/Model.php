<?php 
include_once 'RfidController.php';

class Model{

	public function generateNewModelForm(){
		print(" <br><br><br><br><br><br><form action = addNewModel.php method=post>
			New Model: <input name=modelName type=text id='model'>
			Make:<input name=makeName type=text id='make'>
			Nomenclature:<input name=nomName type=text id='nomenclature' style='text-transform:uppercase'><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
		
	}
	public function generateSelectModelForm(){
		print(" <form action = selModel.php method=post>
			Select Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdateModelForm(){
		print(" <form action = upModel.php method=post>
			Update Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeleteModelForm(){
		print(" <br><br><br><form action = delModel.php method=post>
			Delete Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}

	//CRUD Sequence for Model
	public function insertModel($inModel,$inMake,$inCategory){//doesn't handle photos now
		$conn = RfidController::connect();
		$sql = "INSERT INTO models (model_Name,make_id,nom_id,created_at, updated_at, delete_Boolean) VALUES ('$inModel',(SELECT make_id FROM makes WHERE makeName = '$inMake'),(SELECT nomenclature_id FROM nomenclature WHERE nomenclature_Name = '$inCategory') ,CURDATE(),CURDATE(),'0')";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}	
	public function selectModel($inModel){
		$conn = RfidController::connect();
		$sql = "SELECT model_id,model_Name, make_id,created_at,updated_at FROM models WHERE delete_Boolean = '0' AND model_Name like '$inModel%'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "ModelID: " . $row["model_id"]. " - ModelName: " . $row["model_Name"]. " MakeID: ". $row["make_id"]." Created: " . $row["created_at"]." Updated: ". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}
		$conn->close();
	}	
	//currently don't need this function either until we incorporate pictures.
	/*public function updateModel($inModel){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE model SET updated_at = CURDATE() WHERE model_id = $inModel";
		$conn->query($sql);
		echo "Success";
	}	*/
	
	public function deleteModel($inModel){// can't implement until delete fields are added to the tables. 
		$conn = RfidController::connect();
		$sql = "UPDATE models SET delete_Boolean = '1',updated_at = CURDATE() WHERE model_Name = '$inModel'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	
	public function createModelView($selectedModel){

		$conn = RfidController::connect();
		$sql = "SELECT items.rfid, items.items_id, items.serialNum, locations.location_id, locations.roomNumber, makes.makeName, models.model_name, models.model_id, users.userName, users.user_id FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id join users on items.user_id=users.user_id where models.model_id = '$selectedModel'";
		$result = $conn->query($sql);
		echo "<table>
		<tr>
		<th>RFID</th>
		<th>Serial Number</th>
		<th>Room Number</th>
		<th>Hand Receipt Holder</th>	
		</tr>";
		while($row = mysqli_fetch_array($result)) {
			$selectedLocation=$row["location_id"];
			$selectedItem=$row["items_id"];
			$selectedUser=$row["user_id"];
    		echo "<tr>";
    		echo "<td><a href=itemLandingPage.php?fn=$selectedItem>" . $row['rfid'] . "</td>";
    		echo "<td>" . $row['serialNum'] . "</td>";
    		echo "<td><a href=locationLandingPage.php?fn=$selectedLocation>" . $row['roomNumber'] . "</td>";
    		echo "<td><a href=emailLandingPage.php?fn=$selectedUser>" . $row['userName'] . "</td>";
    		echo "</tr>";
    	}
		echo "</table>";


		if (!$result) {
    		printf("Error: %s\n", mysqli_error($conn));
    		exit();
		}
		echo "<br/>";
		$conn->close();
	}
}
?>