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
$inLastname = $_GET['inLastname'];
$inFirstname = $_GET['inFirstname'];
$inRank = $_GET['inRank'];
$con = mysqli_connect('localhost','root','sqldba');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"rfid_database");

$sql="SELECT userName, lastName, firstNAme, payGrade, user_id FROM users where lastName like '$inLastname%' and firstNAme like '$inFirstname%' and  payGrade like '$inRank%' and delete_Boolean = '0' order by lastName";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Username</th>
<th>Lastname</th>
<th>Firstname</th>
<th>Rank</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
	$selectedUser=$row["user_id"];
    echo "<tr>";
    echo "<td><a href=emailLandingPage.php?fn=$selectedUser>" . $row['userName'] . "</td>";
    echo "<td>" . $row['lastName'] . "</td>";
    echo "<td>" . $row['firstNAme'] . "</td>";
    echo "<td>" . $row['payGrade'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>