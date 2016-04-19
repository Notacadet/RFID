<?php
include('session.php');
include 'RfidController.php';
//include_once 'Make.php';
$rC = new RfidController();
$header = $rC->getNewHeader();
$header->printHTMLHeader();
print"<br><br>";
print '<b id="welcome">Welcome: </b>';
?>

<?php echo $login_session; ?>

<?php
$footer = $rC->getNewFooter();
$footer->printHTMLFooter();	
	
?>

