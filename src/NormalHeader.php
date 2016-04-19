<?php
class Normalheader {

	public function printHTMLHeader(){ 
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
				<li><a class='active' href=index_login.php>Home</a></li>
				<li><a href=NormalhandReciptHolderPage.php>Hand Receipts</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Items</a>
					<div class='dropdown-content'>
						<a href=NormalliveItem.php>Search by Item</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Models</a>
					<div class='dropdown-content'>
						<a href=NormalliveModel.php>Search by Model</a>
						<a href=NormaladdPicture.php>Upload Picture</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Users</a>
					<div class='dropdown-content'>
						<a href=NormalliveUser.php>Search User</a>
					</div>
				</li>
				<li><a href=#>Latest Update</a></li>
				<li><a href=NormalliveLocation.php>Locations</a></li>
			</ul>
		</body>
		");
	}
}
?>

