<?php
class insertNom implements NomDAO
{

	    public function selectNomenclature($categoryName){
        $servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
        $result = $conn->query("SELECT $categoryName FROM nomenclature");
        $articles = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = $row;
        }
        $result->closeCursor();
        return $articles;
    }
   	public function insertNomenclature($categoryName){
		//$conn = connect();
		$servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO 'nomenclature'('nomenclature_Name', 'created_at', 'updated_at') VALUES ('$categoryName',CURDATE(),CURDATE())";
		$conn->query($sql);
		print $sql;
		echo "Success"; 
		$conn->close();
	}
}