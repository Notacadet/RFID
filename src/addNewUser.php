<?php 
	include 'RfidController.php';

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$username=$_POST['username'];
	$rank=$_POST['rank'];

	$rC = new RfidController();
	$users = $rC->getNewUser();
	$users->insertUser($firstname, $lastname, $username, $rank);

?>