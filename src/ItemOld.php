<?php 

class rfid{
	
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
<html>
<head>
<script type="text/javascript">
var inrfid='';
var inSerial='';
var inLocation='';
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
  	xmlhttp.open("GET","getrfid.php?inrfid=" + rfid + "&inSerial=" + serialNum + "&inLocation=" + roomNumber, true);
  	xmlhttp.send();
}

</script>
</head>
<body>

<div class="Header">
<?php include("header.php");
</div>
	public function generateSelectrfidForm(){
		print(" <br><br><br><form action = selRFID.php method=post>
			Search RFID: <input type="text" size="30" onkeyup="rfid=this.value; showResult(rfid, serialNum, roomNumber);">
			Search Serial: <input type="text" size="30" onkeyup="serialNum=this.value; showResult(rfid, serialNum, roomNumber);">
			Search Location: <input type="text" size="30" onkeyup="roomNumber=this.value; showResult(rfid, serialNum, roomNumber);">
			</form>)
	}

?>
</body></html>
		");
	}

?>