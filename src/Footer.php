

<?php

class Footer {

	public function printHTMLFooter(){
		print("</body><br><br><br><br><br><br><br><p>This site maintained by the RFID Capstone Group. A subsidiary of CSG.</p></html>");
	}
}

?>

<?php
include('session.php');


echo $login_session;
?>