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
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT makes.makeName, count(models.model_name) as Models FROM models left join makes on models.make_id=makes.make_id where makeName like '%$inMake%' and models.delete_Boolean='0' group by makeName order by makeName";
$result = mysqli_query($con,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
echo "<table>
<tr>
<th>Make Name</th>
<th>Model Name</th>
</tr>";


while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
    echo "<td><a href=https://www.google.com>" . $row['makeName'] . "</td>";
    echo "<td>" . $row['Models'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>