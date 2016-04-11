<?php
 // just so we know it is broken
 // some basic sanity checks
     //connect to the db
     $conn = new PDO("mysql:host=localhost;dbname=RFID_Database", 'developer', 'cisco123');
     // select our database
     // get the image from the db
     $sql = "SELECT photo FROM storeimages WHERE photo_id=1";
     
	$stmt = $conn->prepare($sql);
	$stmt->execute(); 
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$array = $stmt->fetch();
	header('Content-Type: image/jpeg');
	echo $array['photo'];
?>