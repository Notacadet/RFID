<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	//include_once 'handReciepts.php';
	
	
	
	$rC = new RfidController();
	//$hrhelper=new handReciepts
	//$rC->printHTMLHeader();
	//$rC->selectHandReciept();
	
	//Connection to the database
	$servername = "localhost";
	$username = "evasung";
	$password = "hello";
	$dbname = "rfid_database";
	$conn = new mysqli($servername,$username,$password,$dbname);
	if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
	}
	
	//pulling data from the database 
	$nameInfo= "SELECT firstName,lastName FROM users";
	$result = $conn->query($nameInfo);
	$nameArray= array();
	
	//<table border="1"> 
	if ($result -> num_rows > 0 ){
		//output data of each row into the Array  
		while ($row=$result->fetch_assoc()){
			//$nameArray[]= (string)$row;
			$holder=implode(" ",$row);
			echo "<br>";
			echo "<td>"."<a href=https://www.google.com>$holder</a>"."<br>"."</td>"; 
		};
	}
	
	//Print out names in the Array as hyperlinks
	//foreach($nameArray as $value){
		//$holder=(string)$value
		//echo "<a href=https://www.google.com>$value</a>";
	//}	
	
	$rC->printHTMLFOOTER();
	
	
	
	//While loop to go through and print out the Hand reciept holder names. 
	//$index=0;
	//while (index <= hrList.length){
	//	print "<tr>";
	//		$colindex=0;
	//		while (colindex < $hrList[index].length){
	//			print "<td>";
	//			if (collindex==0) {
	//				$name = $hrList[index] [colindex];
	//				print "
	//					$name </a>";
	//			}
	//			else{
	//			 print $hrList[index][colindex];
	//			}
	//		print "</td>";
	//		}
	//	print "</tr>";
	
	//}
	
	
	
	//function getHRList(){
	//	$servername = "localhost";
	//	$username = "evasung";
	//	$password = "hello";
	//	$dbname = "rfid_database";
	//	$conn = new mysqli($servername,$username,$password,$dbname);
	//	if ($conn->connect_error) {
	//	    die("Connection failed: " . $conn->connect_error);
	//	}
		// nameInfo grabs the first and last name from the user table where their delete boolean =0 meaning they have not been deleted.
		//"SELECT firstName,lastName  FROM users WHERE `delete_Boolean` = '0' " -> intended to filter 
	//	$nameInfo= "SELECT firstName,lastName FROM users";
		
		//Transform string data into an array to traverse
	//	$nameArray = array str_split(string $nameInfo explode());
	//	
	//	return nameArray; 
	//	}
		
		

	
	
	
?>