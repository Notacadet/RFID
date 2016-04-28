<?php 
//include_once 'RfidController.php';

class item{

	public function generateNewItemForm(){
		print(" <br><form action = addNewItem.php method=post>
			New Item: <input name=rfid type=text id='rfid'><br>
			Model:<input name=model_Name type=text id='model_Name'><br>
			Location:<input name=roomNumber type=text id='location'><br>
			Serial Number: <input name=serialNum type=text id='serialNum'><br>
			Commments: <input name=comments type text id='comments'><br>
			Price:<input name=price	type=text id='price'><br>
			Hand Receipt Holder: <input name=userName type=text id='userName'><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
		
	}

	public function insertItem($rfid,$model_Name,  $location,$serialNum, $comments,$price ,$hrHolder){
		$conn = RfidController::connect();//THIS WORKS
		$check=mysqli_query($conn, "select * from items where rfid='$rfid'");
		$checkrows=mysqli_num_rows($check);
		if($checkrows>0){
			echo "Item already exists";
		}
		else{
			$sql = "INSERT INTO items (rfid, model_id, location_id, serialNum,  comments, price,  hrholder_id, delete_Boolean) VALUES ('$rfid', (SELECT model_id FROM models WHERE model_Name = '$model_Name'), (SELECT location_id FROM locations WHERE roomNumber = '$location'), '$serialNum', '$comments', '$price', (SELECT user_id FROM users WHERE userName = '$hrHolder'), '0')";
			$result = $conn->query($sql);
			if (!$result) {
   				printf("Error: %s\n", mysqli_error($conn));
    		exit();
			}
			$conn->close();
			echo "Item added";
		}

	}
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