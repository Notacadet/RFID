
<?php 
	include 'RfidController.php';
	include 'handReceipt.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();
	
	$conn = RfidController::connect();//THIS WORKS
	
	print"<br><br>";
	
	//pulling data from the database 
	$nameInfo= "SELECT firstName,lastName FROM users ORDER BY lastName ASC";
	$result = $conn->query($nameInfo);
	
	$nameArray= array();
	
	//table 
	if ($result -> num_rows > 0 ){
		//output data of each row into the Array
		echo "<table border='0'><tr><th>Xfer From</th><th>Xfer To</th><th>Number of Items</th>";
		while ($row=$result->fetch_assoc()){
			$holder=implode(" ",$row);
			echo "<tr>"."<td>";
			echo "<a href='nameToEmail.php?fn=$holder'> $holder</a>"."<br>"."</td>"."<td>"."<a href='nameToCsv.php?fn=$holder'>CSV Export</a>"."</td>"."<td>"."holder"."</td>"."</tr>"; 
		};
	echo "</tr></table>";
	}
		
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();


?>