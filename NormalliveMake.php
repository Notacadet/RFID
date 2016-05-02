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
				<li><a class='active' href=index.php>Home</a></li>
				<li><a href=NormalhandReciptHolderPage.php>Hand Receipts</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Items</a>
					<div class='dropdown-content'>
						<a href=NormalliveItem.php>Search by Item</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Makes</a>
					<div class='dropdown-content'>
						<a href=NormalliveMake.php>Search by Make</a>
					</div>
				</li>
				
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Models</a>
					<div class='dropdown-content'>
						<a href=NormalliveModel.php>Search by Model</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Users</a>
					<div class='dropdown-content'>
						<a href=NormalliveUser.php>Search User</a>
					</div>
				</li>
				<li><a href=#>Latest Update</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Location</a>
					<div class='dropdown-content'>
						<a href=NormalliveLocation.php>Search Locations</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Nomenclature</a>
					<div class='dropdown-content'>
						<a href=NormalliveNomenclature.php>Search by Nomenclature</a>
					</div>
				</li>

			</ul>

<script type="text/javascript">
var make="";
function showResult(make) {
	var xmlhttp;
 	if (make.length==0) {
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
  	xmlhttp.open("GET","getMake.php?inMake=" + make, true);
  	xmlhttp.send();
}

</script>
</head>
<body>

<div class="Header">
<?php include("../admin/header.php");?>
</div>
<br>
<br>
<br>
<br>
<form>
Search Make: <input type="text" size="30" onkeyup="make=this.value; showResult(make);">
</form>
<div id="livesearch"></div>
</body>
</html> 