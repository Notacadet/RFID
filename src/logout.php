<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}
?>

<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->