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
$inSerial = $_GET['inSerial'];
$inrfid = $_GET['inrfid'];
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT items.rfid, items.serialNum, items.items_id, makes.make_id, locations.roomNumber, locations.location_id, makes.makeName, models.model_name, models.model_id, users.userName, users.user_id FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id join users on items.user_id=users.user_id where rfid like '%$inrfid%' and serialNum like '%$inSerial%' and items.delete_Boolean='0' order by rfid";
$result = mysqli_query($con,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
echo "<table>
<tr>
<th>RFID</th>
<th>Serial Number</th>
<th>Room Number</th>
<th>Make Name</th>
<th>Model Name</th>
<th>HR Holder</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
	$selectedModel=$row["model_id"];
	$selectedMake=$row["make_id"];
	$selectedLocation=$row["location_id"];
	$selectedItem=$row["items_id"];
	$selectedUser=$row["user_id"];
    echo "<tr>";
    echo "<td><a href=itemLandingPage.php?fn=$selectedItem>" . $row['rfid'] . "</td>";
    echo "<td>" . $row['serialNum'] . "</td>";
    echo "<td><a href=locationLandingPage.php?fn=$selectedLocation>" . $row['roomNumber'] . "</td>";
    echo "<td><a href=makeLandingPage.php?fn=$selectedMake>" . $row['makeName'] . "</td>";
    echo "<td><a href=modelToModel_id.php?fn=$selectedModel>" . $row['model_name'] . "</td>";
    echo "<td><a href=emailLandingPage.php?fn=$selectedUser>" . $row['userName'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>