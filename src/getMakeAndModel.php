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
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT makes.makeName, models.model_name, nomenclature.nomenclature_Name FROM models join makes on models.make_id=makes.make_id join nomenclature on models.nom_id=nomenclature.nomenclature_id where makeName like '%$inMake%' and model_name like '%$inModel%' and models.delete_Boolean='0'";
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
</tr>";


while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
    echo "<td>" . $row["makeName"]."</a></td>";
    echo "<td><a href=https://www.google.com>" . $row['model_name'] . "</td>";
    echo "<td><a href=https://www.google.com>" . $row['nomenclature_Name'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>