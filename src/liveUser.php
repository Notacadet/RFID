<html>
<head>
Search
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