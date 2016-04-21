<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewNormalHeader();
	$header->printHTMLHeader();
?>


<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Asset Management System Login</title>
</head>
<body>
<div id="main">
<h1>AMS</h1>
<div id="login">
<h2>Admin Login Form</h2>
<form action="" method="post">
<label>Administrator :</label>
<input id="name" name="username" placeholder="Admin Only" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>

<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->