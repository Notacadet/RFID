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
$inNomenclature = $_GET['inNomenclature'];
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT nomenclature.nomenclature_Name, nomenclature.nomenclature_id, count(items.items_id) as items FROM nomenclature left join models on models.nom_id=nomenclature.nomenclature_id join items on items.model_id=models.model_id where nomenclature_Name like '%$inNomenclature%' group by nomenclature_Name order by nomenclature_Name";
$result = mysqli_query($con,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
echo "<table>
<tr>
<th>Nomenclature</th>
<th>Number of Items</th>
</tr>";


while($row = mysqli_fetch_array($result)) {
	$selectedNom=$row["nomenclature_id"];
	echo "<tr>";
    echo "<td><a href=nomLandingPage.php?fn=$selectedNom>" . $row['nomenclature_Name'] . "</td>";
    echo "<td>" . $row['items'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>