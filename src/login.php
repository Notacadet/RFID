<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect('localhost','developer','cisco123','RFID_Database');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password); 
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection,"select * from users where pass='$password' AND userName='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: C:\wamp\www\RFID\src"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection 
}
}
?>

<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->
