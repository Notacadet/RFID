<?php 

class Rfid{
	
		/*public function showResult(rfid & serialNum) {
			var inrfid='';
			var inSerial='';
			var xmlhttp;
		 	if (rfid.length==0 & serialNum.length==0) {
		    	document.getElementById("livesearch").innerHTML="";
		    	document.getElementById("livesearch").style.border="0px";
		  	}
		  	if (window.XMLHttpRequest) {
		   	 // code for IE7+, Firefox, Chrome, Opera, Safari
		    	xmlhttp=new XMLHttpRequest();
		  	} else {  // code for IE6, IE5
		    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  	}
		  	xmlhttp.onreadystatechange=function() {
		    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      	document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		      	document.getElementById("livesearch").style.border="1px solid #A5ACB2";
		    	}
		  	}
		  	xmlhttp.open("GET","getrfid.php?inrfid=" + rfid + "&inSerial=" + serialNum, true);
		  	xmlhttp.send();
		}


<form>
Search RFID: <input type="text" size="30" onkeyup="rfid=this.value; showResult(rfid, serialNum);">
Search Serial: <input type="text" size="30" onkeyup="serialNum=this.value; showResult(rfid, serialNum);">
</form>
<div id="livesearch"></div>*/


	public function generateSelectrfidForm(){
		print(" <br><br><br><form action = selRFID.php method=post>
			Select RFID: <input name=rfid type=text >
			Select Serial: <input name=serial type=text ><br>
				  <input value=Submit Data type=Submit>

		</form></body></html>
		");
	}

			
	public function selectRFID($inrfid, $inSerial){
		$conn = RfidController::connect();
		$sql = "SELECT items.rfid, items.serialNum, locations.roomNumber, makes.makeName, models.model_name FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id where rfid like '%$inrfid%' and serialNum like '%$inSerial%'";
		//$sql = "SELECT * from 'makes'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			echo "<table><tr><th>RFID</th><th>Serial Number</th><th>Location</th><th>Make</th><th>Model</th></tr>";
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "<tr><td>" . $row["rfid"]. "</td><td>" . $row["serialNum"]. "</td><td>" . $row["roomNumber"]."</td><td>". $row["makeName"]."</td><td>". $row["model_name"]. "</td></tr>";
    		}
    		echo "</table>";
		} 
		else {
    		echo "0 results";
		}
		$conn->close();
	}		
			
			
			
			
			
	//public function getNewMake(){
	
	
	//}
	
	/*function getMakeID() 
<form action="createLocation.php" method="post">
	Room Number: <input name="roomNumber" type="text" ><br>
	Created: <input name="created_at" type="text">
	Updated: <input name="updated_at" type="text"><br>
	<input value="Submit Data" type="Submit">
</form>

	<?php

class make
{
	public $prop1 = "<form action='addNewMake.php' method='post'>
	<p>Make: <input type = 'text' name = 'make'></p>
	<p>Model: <input type = 'text' name = 'model'></p>
	<input type='submit' value='Submit'>
	</form>";
	
	public function getForm()
    {
      return $this->prop1 . "<br />";
    }
}
	
	$newobj = new make;
	
	echo $newobj->getForm();	



/*	
	{//returns makeID from makes table
		$sql = "SELECT $makeName from makes";
	}
	function getMakeName()
	{
	
	}
	function setMakeName($newName)
	{
	
	}
	function generateNewMakeForm(){
	
	
	}
	function processNewMake()
	{
	
	}

	*/
	}
?>