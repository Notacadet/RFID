<?php
class Header {

	public function printHTMLHeader(){
		print("<!doctype html>
		<html lang=en>
		<head>
		<meta charset=UTF-8>
		<title>EAMS</title>
		<meta name=viewport content='width=device-width, initial-scale=1'>
		<link rel=stylesheet href=navMenu.css>
		</head>
		<body>
		<h1>EECS Asset Management System</h1>
		<label for=show-menu class=show-menu>Show Menu</label>
		<input type=checkbox id=show-menu role=button>
		<ul id=menu>
<<<<<<< HEAD
		<li><a href=#>Home</a></li>
		<li><a href=handReciptHolderPage.php>Hand Reciept</a></li>
=======
		<li><a href=home.php>Home</a></li>
		<li><a href=#>Hand Receipts</a></li>
>>>>>>> origin/master
		<li><a href=searchPage.php>Search</a></li>
		<li><a href=makeAndModelPage.php>Makes and Models</a></li>
		<li><a href=ProfilePage.php>Profiles</a></li>
		</ul>");
	}
}

?>

