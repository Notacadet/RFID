<?php 
//include_once 'RfidController.php';

class Make{
	
	public function generateNewMakeForm(){
		print(" <br><br><br><form action = addNewMake.php method=post>
			New Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateSelectMakeForm(){
		print(" <form action = selMake.php method=post>
			Select Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdateMakeForm(){
		print(" <form action = upMake.php method=post>
			Update Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeleteMakeForm(){
		print(" <form action = delMake.php method=post>
			Delete Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}		
	//CRUD Sequence for Make
	public function insertMake($makeName){
		$conn = RfidController::connect();//THIS WORKS
		$check=mysqli_query($conn, "select * from makes where makeName='$makeName'");
		$checkrows=mysqli_num_rows($check);
		if($checkrows>0){
			echo "Make Exists";
		}
		else{

			$sql = "INSERT INTO makes( makeName, created_at, updated_at) VALUES ('$makeName',CURDATE(),CURDATE())";
			$result = $conn->query($sql) or die('Error querying database');
			$conn->close();
			echo "New Make Added";
		}
		
		
	}
	public function selectMake($inMake){
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
	public function deleteMake($inMake){//not functional until we add the delete fields to the tables 
		$conn = RfidController::connect();
		$sql = "UPDATE makes SET delete_Boolean = '1', updated_at = CURDATE() WHERE makeName = '$inMake'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
	public function createMakeView($selectedMake){

		$conn = RfidController::connect();
		$sql = "SELECT models.model_id, makes.makeName, models.model_name, makes.make_id, nomenclature.nomenclature_id, nomenclature.nomenclature_Name, count(models.model_name) as modName FROM models join makes on models.make_id=makes.make_id join nomenclature on models.nom_id=nomenclature.nomenclature_id join items on models.model_id=items.model_id where makes.make_id = '$selectedMake' group by models.model_name order by nomenclature.nomenclature_name";
		$result = $conn->query($sql);
		if (!$result) {
    		printf("Error: %s\n", mysqli_error($con));
    		exit();
		}
		echo "<table>
		<tr>
		<th>Nomenclature</th>
		<th>Model Name</th>
		<th>Total</th>
		</tr>";
		
		if ($result -> num_rows > 0 ){
				//output data of each row into the Array  
				while ($row=$result->fetch_assoc()){
					//$nameArray[]= (string)$row;
					$selectedMake=$row["make_id"];
					$selectedModel=$row["model_id"];
					$selectedNom=$row["nomenclature_id"];
					echo "<tr>";
		    		echo "<td><a href=nomLandingPage.php?fn=$selectedNom>" . $row['nomenclature_Name'] . "</td>";
		    		echo "<td><a href=modelToModel_id.php?fn=$selectedModel>" . $row['model_name'] . "</td>";   		
		    		echo "<td>" . $row["modName"]."</a></td>";
		    		echo "</tr>";
		    	}
				echo "</table>";
		}
		echo "<br/>";
		$conn->close();
	}

}
?>