<?php 
//include_once 'RfidController.php';

class item{

	public function generateSelectItemForm(){
		/*print(" <br><br><br><form action = selItem.php method=post>
			Select Item: <input name=rfid type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");*/

		print(' <br><br><br><form action = selItem.php method=post>
			Search RFID: <input type="text" size="30" onkeyup="rfid=this.value; showResult(rfid, serialNum, roomNumber)";>
			Search Serial: <input type="text" size="30" onkeyup="serialNum=this.value; showResult(rfid, serialNum, roomNumber)";>
			Search Location: <input type="text" size="30" onkeyup="roomNumber=this.value; showResult(rfid, serialNum, roomNumber)";>
		</form>');
	}

	public function printItem(){
		print('<script type="text/javascript">
		var inrfid="";
		var inSerial="";
		var inLocation="";
		function showResult(rfid, serialNum, roomNumber) {
			var xmlhttp;
		 	if (rfid.length==0 & serialNum.length==0 & roomNumber.length==0) {
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
		  	xmlhttp.open("GET","getItem.php?inrfid=" + rfid + "&inSerial=" + serialNum + "&inLocation=" + roomNumber, true);
		  	xmlhttp.send();
		</script>');
	}
	
	public function selectItem($inSerial, $inrfid, $inLocation){
		$con = mysqli_connect('localhost','root','sqldba');
		if (!$con) {
		    die('Could not connect: ' . mysqli_error($con));
		}

		mysqli_select_db($con,"rfid_database");
		
		$sql="SELECT items.rfid, items.serialNum, locations.roomNumber, makes.makeName, models.model_name FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id";
		$result = mysqli_query($con,$sql);
	
		echo "<table>
		<tr>
		<th>RFID</th>
		<th>Serial Number</th>
		<th>Room Number</th>
		<th>Make Name</th>
		<th>Model Name</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
		    echo "<tr>";
		    echo "<td>" . $row['rfid'] . "</td>";
		    echo "<td>" . $row['serialNum'] . "</td>";
		    echo "<td>" . $row['roomNumber'] . "</td>";
		    echo "<td>" . $row['makeName'] . "</td>";
		    echo "<td>" . $row['model_name'] . "</td>";
		    echo "</tr>";
		}
		echo "</table>";
		mysqli_close($con);
	}
}
?>