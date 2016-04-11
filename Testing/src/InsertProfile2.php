<?php

class insertProfile implements InsertProfileDAO
{
	public function selectProfile(){
		$servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		$sql = "SELECT userName,lastName,firstNAme,payGrade FROM users"; //WHERE'delete' = 0 AND  `nomenclature_Name` like '$categoryName%'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "Username: " . $row["userName"]. " - Last Name: " . $row["lastName"]. " First Name:" . $row["firstNAme"]." Grade: ". $row["payGrade"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}
		$conn->close();
	}
	public function insertProf($fName,$lName,$rank){//going to need to alter the users table to handle the parameters.
		$servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		$sql = "INSERT INTO `users`(`userName`, `lastName`,`firstNAme`, `payGrade`) VALUES ('$fName'+'.'+'$lName'+'@usma.edu' ,'$fName','$lName','$rank')"; //im assuming here that they have a usma.edu email address
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}	
}	