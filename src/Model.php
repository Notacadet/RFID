<?php 
//include_once 'RfidController.php';

class Model{

	public function generateNewModelForm(){
		print(" <br><br><br><br><br><br><form action = addNewModel.php method=post>
			New Model: <input name=modelName type=text id='model'>
			Make:<input name=makeName type=text id='make' >
			Nomenclature:<input name=nomName type=text id='nomenclature' ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateSelectModelForm(){
		print(" <form action = selModel.php method=post>
			Select Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateUpdateModelForm(){
		print(" <form action = upModel.php method=post>
			Update Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}
	public function generateDeleteModelForm(){
		print(" <form action = delModel.php method=post>
			Delete Model: <input name=modelName type=text ><br>
				  <input value=Submit Data type=Submit>
		</form>
		");
	}

	//CRUD Sequence for Model
	public function insertModel($inModel,$inMake,$inCategory,$inPhoto){//doesn't handle photos now
	$maxsize = 10000000; //set to approx 10 MB
    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {  
  
               //checks whether uploaded file is of image type
              //if(strpos(mime_content_type($_FILES['userfile']['tmp_name']),"image")===0) {
                 $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
                    // put the image in the db...
                    // database connection
				}
		$conn = RfidController::connect();
		$sql = "INSERT INTO models (model_Name,make_id,nom_id, photo, photo_name, created_at, updated_at, delete_Boolean) VALUES ('$inModel',(SELECT make_id FROM makes WHERE makeName = '$inMake'),(SELECT nomenclature_id FROM nomenclature WHERE nomenclature_Name = '$inCategory'),('{$imgData}') ,CURDATE(),CURDATE(),'0')";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}	
	public function selectModel($inModel){
		$conn = RfidController::connect();
		$sql = "SELECT model_id,model_Name, make_id,created_at,updated_at FROM models WHERE delete_Boolean = '0' AND model_Name like '$inModel%'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			// output data of each row
   		 	while($row = $result->fetch_assoc()) {
        		echo "ModelID: " . $row["model_id"]. " - ModelName: " . $row["model_Name"]. " MakeID: ". $row["make_id"]." Created: " . $row["created_at"]." Updated: ". $row["created_at"]. "<br>";
    		}
		} 
		else {
    			echo "0 results";
		}
		$conn->close();
	}	
	//currently don't need this function either until we incorporate pictures.
	/*public function updateModel($inModel){
		$servername = "localhost";
		$username = "root";
		$password = "toor";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		$sql = "UPDATE model SET updated_at = CURDATE() WHERE modelName = $inModel";
		$conn->query($sql);
		echo "Success";
	}	*/
	
	public function deleteModel($inModel){// can't implement until delete fields are added to the tables. 
		$conn = RfidController::connect();
		$sql = "UPDATE models SET delete_Boolean = '1',updated_at = CURDATE() WHERE model_Name = '$inModel'";
		$result = $conn->query($sql);
		if(!$result){
				die("Didn't Work " . mysqli_error($conn));
		}
		else echo "Success";
		$conn->close();
	}
}
?>