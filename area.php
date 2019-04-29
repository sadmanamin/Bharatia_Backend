<html>
<head><title>Input Area for Chittagong</title></head>
    <body>
        <h1>Input Area for Chittagong</h1>
        <form action="" method="post">
            
		Area <input type="text" name="Area" value="" placeholder="Enter Area" /><br/>
        <input type="submit" name="btnSubmit" value="Submit"/>    
        </form>
        </body>
        </html>

<?php

$response = array();

//City <input type="text" name="City" value="" placeholder="Enter City" /><br/>

	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	
	//$city=$_POST['City'];
	$area=$_POST['Area'];
	//echo $city;
	$query1=mysql_query("SELECT * FROM Area where Name like '$area%'");
	
	if(mysql_num_rows($query1)>0) echo "Name already exists";
	
	else{
	$query=mysql_query("INSERT INTO `Area`(`City`,`Name`) VALUES ('Chittagong','$area')");
	}
    if($query) echo "Successfully Added";
	
?>