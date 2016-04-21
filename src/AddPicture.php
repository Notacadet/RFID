<?php 
	include 'RfidController.php';
	//include_once 'Make.php';
	
	$rC = new RfidController();
	$header = $rC->getNewHeader();
	$header->printHTMLHeader();

?>

<html>
<script type="text/javascript">
var make='';
var model='';
function showResult(make, model) {
	var xmlhttp;
 	if (make.length==0 & model.length==0) {
    	document.getElementById("livesearch").innerHTML="";
    	document.getElementById("livesearch").style.border="0px";
  	}
  	if (window.XMLHttpRequest) {
   	 // code for IE7+, Firefox, Chrome, Opera, Safari
    	xmlhttp=new XMLHttpRequest();
  	} else {  // code for IE6, IE5
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
    	if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      	document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      	document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    	}
  	}
  	xmlhttp.open("GET","getMakeAndModel.php?inMake=" + make + "&inModel=" + model, true);
  	xmlhttp.send();
}

</script>
</head>
<body>

<br>
<br>
<br>
<br>
<form>
Search Make: <input type="text" size="30" onkeyup="make=this.value; showResult(make, model);">
Search Model: <input type="text" size="30" onkeyup="model=this.value; showResult(make, model);">
</form>
<div id="livesearch"></div>
</body>
</html> 

<html>
<head><title>File Insert</title></head>
<body>
<h3>Please Choose a File and click Submit</h3>

<form enctype="multipart/form-data" action=
"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
<input name="userfile" type="file" />
<input type="submit" value="Submit" />
</form>

<?php
// check if a file was submitted
if(!isset($_FILES['userfile']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try {
    $msg= upload();  //this will upload your image
    echo $msg;  //Message showing success or failure.
    }
    catch(Exception $e) {
    echo $e->getMessage();
    echo 'Sorry, could not upload file';
    }
}
// the upload function
function upload() {
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
                    
                    $conn = mysqli_connect('localhost','developer','cisco123','RFID_Database');
					
					
                    // select the db
                   
					}
                    // our sql query
                    $sql = "INSERT INTO storeimages
                    (photo, photo_name)
                    VALUES
                    ('{$imgData}', '{$_FILES['userfile']['name']}');";
                    // insert the image
                    $result = $conn->query($sql);
                    if(!$result){
						die("Didn't Work " . mysqli_error($conn));
					}
                    $msg='<p>Image successfully saved in database with id ='. mysqli_insert_id($conn).' </p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";
    
    return $msg;
}
// Function to return error message based on error code
function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>
</body>
</html>


<?php
	$footer = $rC->getNewFooter();
	$footer->printHTMLFooter();
	
?>