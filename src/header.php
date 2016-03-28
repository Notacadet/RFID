<?php
class Header {

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
		<label for=show-menu class=show-menu>Show Menu</label>
		<input type=checkbox id=show-menu role=button>
		<ul id=menu>
		<li><a href=homepage.php>Home</a></li>
		<li><a href=handReciptHolderPage.php>Hand Receipts</a></li>
		<li><a href=liveItem.php>Search by Item</a></li>
		<li><a href=liveMakeAndModel.php>Search by Make and Model</a></li>
		<li><a href=liveUser.php>Search User</a></li>
		<li><a href=insertModelPage.php>Create a Make and a Model</a></li>
		<li><a href=insertUserPage.php>Create User</a></li>
		<li><a href=#>Latest Update</a></li>
		<li><a href=#liveItem.php>Create Item</a></li>

		</ul>");
	}
}
?>
