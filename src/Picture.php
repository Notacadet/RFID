<?php 
//include_once 'RfidController.php';

class Picture{
	
	public function generateNewPictureForm(){//addNewPicture.php does not exist
		print(" <br><br><br><form action = addNewPicture.php method=post>
			New Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateSelectPictureForm(){
		print(" <form action = selPicture.php method=post>
			Select Make: <input name=picID type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdatePictureForm(){//upPicture.php does not exist
		print(" <form action = upPicture.php method=post>
			Update Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeletePictureForm(){//delPicture.php does not exist
		print(" <form action = delPicture.php method=post>
			Delete Make: <input name=makeName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}		
	//CRUD Sequence for Make
	public function insertMake($makeName){//not implemented yet
		$conn = RfidController::connect();//THIS WORKS
		$sql = "INSERT INTO makes( makeName, created_at, updated_at) VALUES ('$makeName',CURDATE(),CURDATE())";
		$result = $conn->query($sql);
		if(!$result){
			die("Didn't Work " . mysqli_error($conn));//checks for properly formed query only, not input!
		}
		else echo "Success";
		$conn->close();
	}
	public function selectPicture($picID){
		//
		$conn = RfidController::connect();
		//select what you need to make a picture
		$sql = "SELECT picID FROM makes WHERE delete_Boolean = '0' AND makeName like '$picID%'";
		//$sql = "SELECT * from 'makes'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		if ($result->num_rows > 0){//will probably need to change this part to adhere to whatever format pictures are displayed with.
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
	public function deleteMake($inMake){//not implemented yet
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