<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}
table, td, th {
    border: 1px solid black;
    padding: 10px;
}
th {text-align: left;}
</style>
</head>
<body>
<?php
class handReceipt{
	
	public function createHR($selectedName){
		//$conn = connect();
		$servername = "localhost";
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		
		$sql = "SELECT users.userName, nomenclature.nomenclature_Name, locations.roomNumber, makes.makeName, models.model_Name, items.rfid, items.serialNum FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join nomenclature on nomenclature.nomenclature_id=models.nom_id join makes on models.make_id=makes.make_id join users on users.user_id=items.user_id WHERE userName like '%$selectedName%' ";
		// WHERE user.userName=$selectedName
		$result = $conn->query($sql);
		if(!$result){
			die("Didn't Work " . mysqli_error($conn));
		}
		mysqli_select_db($conn,"rfid_database");
		// output data of each row
		echo "<table>
		<tr>
		<th>Nomenclature</th>
		<th>Count</th>
		<th>Location</th>
		<th>Make</th>
		<th>Model</th>
		<th>Serial Number</th>
		<th>RFID</th>		
		</tr>";
		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['nomenclature_Name'] . "</td>";
			echo "<td> 1 </td>"; 
			echo "<td>" . $row['roomNumber'] . "</td>";
			echo "<td>" . $row['makeName'] . "</td>";
			echo "<td>" . $row['model_Name'] . "</td>";
			echo "<td>" . $row['serialNum'] . "</td>";
			echo "<td>" . $row['rfid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		
	mysqli_close($conn);
		
	}
	
	
}
$testObject = new handReceipt();
$testObject->createHR('in.Turned@usma.edu');
	
?>
</body>
</html>