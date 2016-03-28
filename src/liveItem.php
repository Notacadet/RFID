<html>
<head>
<meta charset=UTF-8>
		<title>EECS Asset Management System</title>
		<meta name=viewport content='width=device-width, initial-scale=1'>
		<link rel=stylesheet href=navMenu.css>
		</head>
		<body>
		<h1>EECS Asset Management System</h1>
		<label for=show-menu class=show-menu>Show Menu</label>
		<input type=checkbox id=show-menu role=button>
		<ul id=menu>
		<li><a href=homepage.php>Home</a></li>
		<li><a href=handReciptHolderPage.php>Hand Receipts</a></li>
		<li><a href=liveItem.php>Search by Item</a></li>
		<li><a href=liveMakeAndModel.php>Search by Make and Model</a></li>
		<li><a href=liveUser.php>Search User</a></li>
		<li><a href=insertModelPage.php>Create a Make and a Model</a></li>
		<li><a href=insertUserPage.php>Create User</a></li>
		<li><a href=#>Latest Update</a></li>
		<li><a href=#liveItem.php>Create Item</a></li>

		</ul>
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

<div class="Header">
<?php include("header.php");?>
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