<?php 
//include_once 'RfidController.php';

class Nomenclature{
	
	public function generateNewNomForm(){
		print(" <br><br><br><form action = addNewNom.php method=post>
			New Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateSelectNomForm(){
		print(" <br><br><br><form action = selNom.php method=post>
			Select Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateUpdateNomForm(){
		print(" <br><br><br><form action = upNom.php method=post>
			Update Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	public function generateDeleteNomForm(){
		print(" <br><br><br><form action = delNom.php method=post>
			Delete Nomenclature: <input name=nomName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form></body></html>
		");
	}
	//CRUD Sequence for Nomenclature
	public function insertNomenclature($categoryName){
		$conn = RfidController::connect();
		$sql = "INSERT INTO nomenclature(nomenclature_Name,created_at, updated_at) VALUES ('$categoryName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	public function selectNomenclature($categoryName){
		$conn = RfidController::connect();
		$sql = "SELECT nomenclature_id,nomenclature_Name,created_at,updated_at FROM nomenclature WHERE delete_Boolean = '0' AND  nomenclature_Name like '$categoryName%'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}

		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "ID: " . $row["nomenclature_id"]. " - Name: " . $row["nomenclature_Name"]. " Created:" . $row["created_at"]."Updated:". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}
		$conn->close();
	}
	//Since there is only one updatable field, updating is the same as deleting and making a new one.	
	public function updateNomenclature($categoryName){
		$conn = RfidController::connect();
		$sql = "UPDATE nomenclature SET updated_at = CURDATE() WHERE categoryName = $categoryName";
		$conn->query($sql);
		echo "Success";
		$conn->close();
	}	
	public function deleteNomenclature($catName){// can't implement until delete fields are added to the tables.
		$conn = RfidController::connect();
		$sql = "UPDATE nomenclature SET delete_Boolean = '1',`updated_at` = CURDATE() WHERE `nomenclature_Name` = '$catName'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
}
?>