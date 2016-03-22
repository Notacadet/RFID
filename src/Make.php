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
		$sql = "INSERT INTO makes( makeName, created_at, updated_at) VALUES ('$makeName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
			die("Didn't Work " . mysqli_error($conn));//checks for properly formed query only, not input!
		}
		else echo "Success";
		$conn->close();
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
	}	}
?>