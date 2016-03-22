<?php 
//include_once 'RfidController.php';

class Model{
	
	public function generateNewModelForm(){
		print(" <form action = addNewModel.php method=post>
			New Model: <input name=modelName type=text ><br>
			Make:<input name=makeName type=text ><br>
			Nomenclature:<input name=nomName type=text ><br>
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
		print(" <form action = delModel.php method=post>
			Delete Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}

	//CRUD Sequence for Model
	public function insertModel($inModel,$inMake,$inCategory){//doesn't handle photos now
		$conn = RfidController::connect();
		$sql = "INSERT INTO `models` (`model_Name`,`make_id`,`nom_id`,`created_at`, `updated_at`) VALUES ($inModel,(SELECT make_id FROM makes WHERE makeName = '$inMake'),(SELECT nomenclature_id FROM nomenclature WHERE nomenclature_Name = '$inCategory') ,CURDATE(),CURDATE())";
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
		$sql = "UPDATE model SET updated_at = CURDATE() WHERE modelName = $inModel";
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
}
?>