<?php

	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	$UserID=$_GET['UserID'];
	$PostID=$_GET['PostID'];
	
	$q1=mysql_query("SELECT * FROM `Bookmark` WHERE PostID=$PostID AND UserID=$UserID");
	$count = mysql_num_rows($q1);
	if($count==1){
	    $query=mysql_query("DELETE FROM `Bookmark` WHERE UserID=$UserID AND PostID=$PostID");
	    $q2=mysql_query("UPDATE `User` SET SaveCnt=SaveCnt-1 WHERE UserID=$UserID");
	}
	else{
	$query=mysql_query("INSERT INTO `Bookmark`(`BId`, `UserID`, `PostID`) VALUES (null,$UserID,$PostID)");
	    $q2=mysql_query("UPDATE `User` SET SaveCnt=SaveCnt+1 WHERE UserID=$UserID");
	}
	if($query) echo "Success nigga";
	else echo "Failed";
?>