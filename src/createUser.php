<?php

class User{
	
	public function generateNewUserForm(){
		print(" <br><br><br><br><br><br><form action=addNewUser.php method=post>
			First Name: <input name=firstname type=text >
			Last Name: <input name=lastname type=text >
			User Name: <input name=username type=text placeholder='joe.smith@example.com'>
			Rank: <select name=rank type=text> 
				  <option value='' disabled selected>Select Rank</option>
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
				  </select><br>
		  				  <input value=Submit Data type=Submit>
		</form><br>
		
		");

	}


	public function insertUser($firstname, $lastname, $username, $payGrade){
		$conn = RfidController::connect();//THIS WORKS
		$sql =  "INSERT INTO users ( userName, lastName, firstNAme,payGrade, pass, User_Type) VALUES ('$username', '$lastname', '$firstname', '$payGrade', 'NULL', 'NULL')";
		$result = $conn->query($sql);
		if(!$result){
			die("Didn't Work " . mysqli_error($conn));//checks for properly formed query only, not input!
		}
		else echo "Success";
		$conn->close();
	}
}
?>
