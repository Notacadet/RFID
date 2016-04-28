<?php
	$conn = mysqli_connect('localhost','developer','cisco123','RFID_Database'); 

	if (!$conn)
		die("Can't connect to MySQL: ".mysqli_connect_error());
	$name=$_GET['fn'];  
	$stmt = $conn->prepare("SELECT photo FROM storeimages WHERE model_Name='$name'"); 

	$stmt->execute();
	$stmt->store_result();

	$stmt->bind_result($image);
	$stmt->fetch();

	header("Content-Type: image/jpeg");
	echo $image; 
	
	//https://blogs.oracle.com/oswald/entry/php_s_mysqli_extension_storing
?>

