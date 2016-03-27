<?php
    $key=$_GET['inrfid'];
    $array = array();
    $con=mysql_connect("localhost","root","sqldba");
    $db=mysql_select_db("rfid_database",$con);
    $query=mysql_query("SELECT items.rfid, items.serialNum, locations.roomNumber, makes.makeName, models.model_name FROM items join locations on items.location_id=locations.location_id join models on items.model_id=models.model_id join makes on models.make_id=makes.make_id where rfid like '%$inrfid%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['title'];
    }
    echo json_encode($array);
?>