<?php

class User{
	
	public function generateNewUserForm(){
		print(" <br><br><br><br><br><br><form action=addNewUser.php method=post>
			 First Name: <input name=firstname type=text >
			 Last Name: <input name=lastname type=text >
			 User Name: <input name=username type=text placeholder='joe.smith@example.com'>
			 Rank: <select name=rank type=text> 
				  <option value='' disabled selected> Select Rank </option>
				  <option value = SSG>SSG</option>
				  <option value = SFC>SFC</option>
				  <option value = MSG>MSG</option>
				  <option value = 2LT>2LT</option>
				  <option value = 1LT>1LT</option>
				  <option value = CPT>CPT</option>
				  <option value = MAJ>MAJ</option>
				  <option value = LTC>LTC</option>
				  <option value = COL>COL</option>
				  <option value = GS>General Service</option>
				  <option value = T10>Title 10</option>
				  <option value = CTR>Contractor</option>
				  </select>
			 Password: <input name=pass type=text placeholder='************'><br>
		  				  <input value=Submit Data type=Submit>
		</form><br>
		
		");

	}
	public function generateDeleteUserForm(){
		print(" <br><br><br><form action = delUser.php method=post>
			Delete User: <input name=userName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}	


	public function insertUser($firstname, $lastname, $username, $payGrade, $pass){
		$conn = RfidController::connect();
		$check=mysqli_query($conn, "select * from users where userName='$username' and delete_Boolean='0'");
		$checkrows=mysqli_num_rows($check);
		if($checkrows>0){
			echo "User Exists";
		}
		else{
			$sql = "INSERT INTO users ( userName, lastName, firstNAme,payGrade, pass, User_Type, delete_Boolean) VALUES ('$username', '$lastname', '$firstname', '$payGrade', '$pass', 'NULL', '0')";
			$result = $conn->query($sql) or die('Error querying database');
			$conn->close();
			echo "User Added";
		}
	}
	public function deleteUser($inUser){//not functional until we add the delete fields to the tables 
		$conn = RfidController::connect();
		$sql = "UPDATE users SET delete_Boolean = '1' WHERE userName = '$inUser'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}


}


?>
