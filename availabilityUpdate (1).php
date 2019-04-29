<?php

	
	require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    
	$PostID=$_GET['PostID'];
	$Avail =$_GET['Avail'];
	
	if($Avail==0 || $Avail==FALSE){
	    //echo 1;
	
	$query1=mysql_query("UPDATE `Post` SET `Availability`=FALSE WHERE `PostID`=$PostID AND `Availability`=TRUE");
	}
	
	else{
	    $query2=mysql_query("UPDATE `Post` SET `Availability`=TRUE WHERE `PostID`=$PostID AND `Availability`=FALSE");
	    //echo 2;
	}
	    
	if($query1 || $query2) echo "Success";
	else echo "Visibility was not changed!";
	
?>