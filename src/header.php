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
						<a href=insertItemPage.php>Create Item</a>
						<a href=deleteItemPage.php>Delete Item</a>
						<a href=#>Update Item</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Makes</a>
					<div class='dropdown-content'>
						<a href=liveMake.php>Search Make</a>
						<a href=InsertMakePage.php>Create a Make</a>
						<a href=deleteMakePage.php>Delete Make</a>
						<a href=#>Update Make</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Models</a>
					<div class='dropdown-content'>
						<a href=liveModel.php>Search by Model</a>
						<a href=InsertModelPage.php>Create a Model</a>
						<a href=deleteModelPage.php>Delete Model</a>
						<a href=#>Update Model</a>
					</div>
				</li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Users</a>
					<div class='dropdown-content'>
						<a href=liveUser.php>Search User</a>
						<a href=insertUserPage.php>Create User</a>
						<a href=deleteUserPage.php>Delete User</a>
						<a href=#>Update User</a>
					</div>
				</li>
				<li><a href=#>Latest Update</a></li>
				<li class='dropdown'>
					<a href='#' class='dropbtn'>Locations</a>
					<div class='dropdown-content'>
						<a href=liveLocation.php>Search by Location</a>
						<a href=insertLocationPage.php>Create Location</a>
						<a href=deleteLocationPage.php>Delete Location</a>
						<a href=#>Update Location</a>
					</div>
				</li>

				<li class='dropdown'>
					<a href='#' class='dropbtn'>Nomenclature</a>
					<div class='dropdown-content'>
						<a href=liveNomenclature.php>Search by Nomenclature</a>
						<a href=insertNomPage.php>Create Nomenclature</a>
						<a href=#>Update Nomenclature</a>
					</div>
				</li>

			</ul>
		</body>
		");
	}
}
?>
