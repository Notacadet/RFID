<html>
<head>
Search
<script type="text/javascript">
var make='';
var model='';
function showResult(make, model) {
	var xmlhttp;
 	if (make.length==0 & model.length==0) {
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
  	xmlhttp.open("GET","getMakeAndModel.php?inMake=" + make + "&inModel=" + model, true);
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
Search Make: <input type="text" size="30" onkeyup="make=this.value; showResult(make, model);">
Search Model: <input type="text" size="30" onkeyup="model=this.value; showResult(make, model);">
</form>
<div id="livesearch"></div>
</body>
</html> 