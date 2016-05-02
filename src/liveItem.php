<!doctype html>
		<html lang=en>
		<head>
		<title>EECS Asset Management System</title>
		<meta name=viewport content='width=device-width, initial-scale=1'>
		<link rel=stylesheet href=navMenu.css>
		</head>
		<body>
		<h1>EECS Asset Management System</h1>
			<ul>
				<li><a class='active' href=home.php>Home</a></li>
				<li><a href=handReciptHolderPage.php>Hand Receipts</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Items</a>
					<div class='dropdown-content'>
						<a href=liveItem.php>Search by Item</a>
						<a href=insertItemPage.php>Create Item</a>
						<a href=#>Delete Item</a>
						<a href=#>Update Item</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Makes</a>
					<div class='dropdown-content'>
						<a href=liveMake.php>Search Make</a>
						<a href=InsertMakePage.php>Create a Make</a>
						<a href=deleteMakePage.php>Delete Make</a>
						<a href=#>Update Make</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Models</a>
					<div class='dropdown-content'>
						<a href=liveModel.php>Search by Model</a>
						<a href=InsertModelPage.php>Create a Model</a>
						<a href=deleteModelPage.php>Delete Model</a>
						<a href=#>Update Model</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Users</a>
					<div class='dropdown-content'>
						<a href=liveUser.php>Search User</a>
						<a href=insertUserPage.php>Create User</a>
						<a href=deleteUserPage.php>Delete User</a>
						<a href=#>Update User</a>
					</div>
				</li>
				<li><a href=#>Latest Update</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Locations</a>
					<div class='dropdown-content'>
						<a href=liveLocation.php>Search by Location</a>
						<a href=insertLocationPage.php>Create Location</a>
						<a href=deleteLocationPage.php>Delete Location</a>
						<a href=#>Update Location</a>
					</div>
				</li>

				<li class='dropdown'>
					<a href='#' class='dropbtn'>Nomenclature</a>
					<div class='dropdown-content'>
						<a href=liveNomenclature.php>Search by Nomenclature</a>
						<a href=insertNomPage.php>Create Nomenclature</a>
						<a href=#>Update Nomenclature</a>
					</div>
				</li>

			</ul>

<script type="text/javascript">
	var rfid='';
	var serialNum='';


function showResult(rfid, serialNum) {
	var xmlhttp;
 	if (rfid.length==0 & serialNum.length==0) {
    	document.getElementById("livesearch").innerHTML='';
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
  	xmlhttp.open("GET","getItem.php?inrfid=" + rfid + "&inSerial=" + serialNum, true);
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
Search RFID: <input type="text" size="30" onkeyup="rfid=this.value; showResult(rfid, serialNum);">
Search Serial: <input type="text" size="30" onkeyup="serialNum=this.value; showResult(rfid, serialNum);">
</form>
<div id="livesearch"></div>
</body>
</html> 