<?php 
//include_once 'RfidController.php';
class deleteModel{

	public function deleteModel($inModel){// can't implement until delete fields are added to the tables. 
		$servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
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