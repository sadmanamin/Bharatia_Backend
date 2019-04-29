<?php

	
	require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
	$PostID=$_GET['PostID'];
	$query= mysql_query("DELETE FROM `Post` WHERE `PostID` =$PostID");
	
	if ($query) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Post Deleted Successfully";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
?>