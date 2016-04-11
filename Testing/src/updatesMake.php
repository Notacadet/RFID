<?php
class updatesMake implements UpdateMakeDAO
{

        public function selectMake($inMake){
            $servername = "localhost";
            $username = "root";
            $password = "sqldba";
            $dbname = "rfid_database";
            $conn = new mysqli($servername,$username,$password,$dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT $inMake FROM makes";
            $result = $conn->query($sql);
            $articles = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $articles[] = $row;
            }
            $result->closeCursor();
            return $articles;
            echo "Success";
    }
		public function updateMake($inMakes){ //don't need this capability
    		$servername = "localhost";
    		$username = "root";
    		$password = "sqldba";
    		$dbname = "rfid_database";
    		$conn = new mysqli($servername,$username,$password,$dbname);
    		if ($conn->connect_error) {
    		    die("Connection failed: " . $conn->connect_error);
    		}
    		$sql = "UPDATE makes SET updated_at = CURDATE() WHERE makeName = $inMakes";
    		$conn->query($sql);
            print $sql;
    		echo "Success";
	}
}