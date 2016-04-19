<?php
class Header {

	public function printHTMLHeader(){
		print'<b id="logout"><a href="logout.php">Log Out</a></b>';
		print("<!doctype html>
		<html lang=en>
		<head>
		<meta charset=UTF-8>
		<title>EECS Asset Management System</title>
		<meta name=viewport content='width=device-width, initial-scale=1'>
		<link rel=stylesheet href=navMenu.css>
		</head>
		<body>
		<h1>EECS Asset Management System</h1>
			<ul>
				<li><a class='active' href=home.php>Home</a></li>
				<li><a href=handReciptHolderPage.php>Hand Receipts</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Items</a>
					<div class='dropdown-content'>
						<a href=liveItem.php>Search by Item</a>
						<a href=#liveItem.php>Create Item</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Makes</a>
					<div class='dropdown-content'>
						<a href=#>Create a Make</a>
						<a href=liveMake.php>Search Make</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Models</a>
					<div class='dropdown-content'>
						<a href=InsertModelPage.php>Create a Model</a>
						<a href=liveModel.php>Search by Model</a>
						<a href=AddPicture.php> Upload a Picture</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Users</a>
					<div class='dropdown-content'>
						<a href=liveUser.php>Search User</a>
						<a href=insertUserPage.php>Create User</a>
					</div>
				</li>
				<li><a href=#>Latest Update</a></li>
				<li><a href=liveLocation.php>Locations</a></li>
			</ul>
		</body>
		");
	}
}
?>


