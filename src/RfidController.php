<?php
include 'Make.php';
include 'Header.php';
include 'Model.php';
include 'Nomenclature.php';
include 'Profile.php';
include 'Item.php';
include 'Footer.php';
include 'createUser.php';
include 'Location.php';




class RfidController
 {
 	//try this first
 	//function __construct(){//this will run the contained code for every object of the class when it is instanstiated
 	//private $conn = RfidController::connect(); //this line is not valid, error from the first parenthetical when it runs outside of the constructor.
 	//how to reference variable from the constructor?
 	//}
 	//$conn = RfidController::connect(); //doesn't work without the double ::
 	// the in function version with the :: works, try the double :: as a field or instance variable. 
 	//it seems to not want instance or field variables holding the results of functions...or something like that. 
 	public static function connect(){//execute to establish connectivity to the database.
		$servername = "localhost"; //default username and passwords for dev/test environments
		$username = "root";
		$password = "sqldba";
		$dbname = "rfid_database";
		$conn = new mysqli($servername,$username,$password,$dbname);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}
	//public $conn = $this::connect();
	//These getters are called to create objects of the classes in the xPage.php files
	public function getNewHeader(){
		return new Header;
	}
	public function getNewFooter(){
		return new Footer;
	}
	public function getNewMake(){ 
		return new Make;
	}
	public function getNewModel(){
		return new Model;
	}
	public function getNewNomenclature(){
		return new Nomenclature;
	}
	public function getnewProf(){
		return new Profile;
	}
	public function getnewItem(){
		return new Item;
	}
	public function getnewUser(){
		return new User;
	}
	public function getnewLocation(){
		return new Location;
	}
 };
 ?>
   
