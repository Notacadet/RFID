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
var lastname='';
var firstname='';
var rank='';
function showResult(lastname, firstname, rank) {
	var xmlhttp;
 	if (lastname.length==0 & firstname.length==0 & rank.length==0) {
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
  	xmlhttp.open("GET","getUser.php?inLastname=" + lastname + "&inFirstname=" + firstname + "&inRank=" + rank, true);
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
Search Lastname: <input type="text" size="30" onkeyup="lastname=this.value; showResult(lastname, firstname, rank);">
Search Firstname: <input type="text" size="30" onkeyup="firstname=this.value; showResult(lastname, firstname, rank);">
Search Rank: <input type="text" size="30" onkeyup="rank=this.value; showResult(lastname, firstname, rank);">
</form>
<div id="livesearch"></div>
</body>
</html> 