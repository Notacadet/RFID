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
$inLocation = $_GET['inLocation'];
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT locations.roomNumber, locations.location_id, count(items.rfid) as items FROM items left join locations on items.location_id=locations.location_id where roomNumber like '%$inLocation%' group by roomNumber ";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>

<th>Room Number</th>
<th>Items</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
	$selectedRoom = $row["location_id"];
    echo "<tr>";
    echo "<td><a href=locationLandingPage.php?fn=$selectedRoom>" . $row['roomNumber'] . "</td>";
    echo "<td>" . $row['items'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>