
<?php
include('session.php');
include 'RfidController.php';
//include_once 'Make.php';

$rC = new RfidController();
$header = $rC->getNewHeader();
$header->printHTMLHeader();
print"<br><br><br>";
print '<b id="welcome">Welcome: </b>';
?>

<?php echo $login_session; ?>

<?php
print'<b id="logout"><a href="logout.php">Log Out</a></b>';
$footer = $rC->getNewFooter();
$footer->printHTMLFooter();	
	
?>




<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->