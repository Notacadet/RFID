<?php 
	include 'RfidController.php';

	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$username=$_POST['username'];
	$rank=$_POST['rank'];
	$pass=$_POST['pass'];

	$rC = new RfidController();
	$users = $rC->getNewUser();
	$users->insertUser($firstname, $lastname, $username, $rank, $pass);

?>