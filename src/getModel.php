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
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php


$inMake = $_GET['inMake'];
$inModel = $_GET['inModel'];
$con = mysqli_connect('localhost','developer','cisco123');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT makes.makeName, models.model_name, makes.make_id, models.model_id, nomenclature.nomenclature_id, nomenclature.nomenclature_Name, count(items.rfid) as Items FROM models join makes on models.make_id=makes.make_id join nomenclature on models.nom_id=nomenclature.nomenclature_id join items on models.model_id=items.model_id where makeName like '%$inMake%' and model_name like '%$inModel%' group by model_name order by nomenclature_Name, model_name, makeName";
$result = mysqli_query($con,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
echo "<table>
<tr>
<th>Make Name</th>
<th>Model Name</th>
<th>Nomenclature</th>
<th>Items</th>
</tr>";

if ($result -> num_rows > 0 ){
		//output data of each row into the Array  
		while ($row=$result->fetch_assoc()){
			//$nameArray[]= (string)$row;
			$selectedModel=$row["model_id"];
			$selectedMake=$row["make_id"];
			$selectedNom=$row["nomenclature_id"];
			echo "<tr>";
    		echo "<td><a href=makeLandingPage.php?fn=$selectedMake>" . $row["makeName"]."</a></td>";
    		echo "<td><a href=modelToModel_id.php?fn=$selectedModel>" . $row['model_name'] . "</td>";
    		echo "<td><a href=nomLandingPage.php?fn=$selectedNom>" . $row['nomenclature_Name'] . "</td>";
    		echo "<td>" . $row["Items"]."</a></td>";
    		echo "</tr>";
		}
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>