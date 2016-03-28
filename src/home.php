
<?php

include 'RfidController.php';
//include_once 'Make.php';

$rC = new RfidController();
$header = $rC->getNewHeader();
$header->printHTMLHeader();
print"<br><br>";
print '<b id="welcome">Welcome to the Electrical Engineering and Computer Science Asset Management System. </b>';
?>


<?php

$footer = $rC->getNewFooter();
$footer->printHTMLFooter();	
	
?>




<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->