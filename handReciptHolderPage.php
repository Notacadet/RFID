<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	//include_once 'handReciepts.php';
	
	
	
	$rC = new RfidController();
	//$hrhelper=new handReciepts
	$rC->printHTMLHeader();
	//$rC->selectHandReciept();
	
	//Get a list of HR holders 
	$hrList=getHRList();
	
	
	//While loop to go through and print out the Hand reciept holder names. 
	$index=0;
	while (index <= hrList.length){
		print "<tr>";
			$colindex=0;
			while (colindex < $hrList[index].length){
				print "<td>";
				if (collindex==0) {
					$name = $hrList[index] [colindex];
					print "
						$name </a>";
				}
				else{
				 print $hrList[index][colindex];
				}
			print "</td>";
			}
		print "</tr>";
	
	}
	
	$rC->printHTMLFOOTER();
	
	function getHRList(){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		// nameInfo grabs the first and last name from the user table where their delete boolean =0 meaning they have not been deleted.
		$nameInfo= "SELECT firstName,lastName  FROM users WHERE `delete_Boolean` = '0' ";

		//Transform string data into an array to traverse
		$nameArray = $row['nameInfo'];
		
		return nameArray; 
		}
		
		

	
	
	
?>