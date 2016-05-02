<?php 

class deleteNomenclature implements deleteNomDAO{

	public function selectNomenclature($categoryName){
		$servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
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

	public function deletesNomenclature($catName){// can't implement until delete fields are added to the tables.
		$servername = "localhost";
        $username = "root";
        $password = "sqldba";
        $dbname = "rfid_database";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		$sql = "UPDATE nomenclature SET delete_Boolean = '1', updated_at = CURDATE() WHERE nomenclature_Name = '$catName'";
		$conn->query($sql);
		echo "Success";
		print $sql;
		$conn->close();
	}
	
}