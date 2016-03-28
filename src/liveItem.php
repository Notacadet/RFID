﻿<?php 
	include 'RfidController.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();	
?>
<html>
<script type="text/javascript">
var rfid='';
var serialNum='';
var roomNumber='';
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
}

</script>
</head>
<body>

</div>
<br>
<br>
<br>
<br>
<form>
Search RFID: <input type="text" size="30" onkeyup="rfid=this.value; showResult(rfid, serialNum, roomNumber);">
Search Serial: <input type="text" size="30" onkeyup="serialNum=this.value; showResult(rfid, serialNum, roomNumber);">
Search Location: <input type="text" size="30" onkeyup="roomNumber=this.value; showResult(rfid, serialNum, roomNumber);">
</form>
<div id="livesearch"></div>
</body>
</html> 

<?php 

	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
?>