<html>
<head><title>Login</title></head>
    <body>
        <h1>Search </h1>
        <form action="" method="post">
           Type1 <input type="number_format" name="Type1" value="" placeholder="Enter" /><br/>
		   Type2 <input type="number_format" name="Type2" value="" placeholder="" /><br/>
		   Rooms <input type="number_format" name="Room_No" value="" placeholder="Enter No of Rooms" /><br/>
            Area <input type="text" name="Area" value="" placeholder="Enter Area" /><br/>
			Price Range <input type="number_format" name="Price1" value="" placeholder="p1" /> to <input type="number_format" name="Price2" value="" placeholder="p2" /><br/>
			Size <input type="number_format" name="Size1" value="" placeholder="p1" /> to <input type="number_format" name="Size2" value="" placeholder="p2" /><br/>
			
            <input type="submit" name="btnSubmit" value="Log In"/>
        </form>
    </body>
</html>

<?php
$response=array();
// include db connect class
	require_once __DIR__ . '/db_connect.php';
 
// connecting to db
	$db = new DB_CONNECT();
	$roomQuery="";
	$areaQuery="";
	$rooms=$_POST['Room_No'];
	$area=$_POST['Area'];
	$pq1=$_POST['Price1'];
	$pq2=$_POST['Price2'];
	$pq="";
	$sz1=$_POST['Size1'];
	$sz2=$_POST['Size2'];
	$sz="";
	$type1=$_POST['Type1'];
	$tq="";
	$type2=$_POST['Type2'];
	
	
	
	if(!empty($_POST['Room_No'])) $roomQuery=" AND Room_No = $rooms";
	
	if(!empty($_POST['Area'])){
	     $areaQuery=" AND Area='$area'";
	 
	}
	
	if(!empty($_POST['Price1']) && !empty($_POST['Price2'])){
		
		$pq=" AND (Price BETWEEN $pq1 AND $pq2)";
		
	}
    
	if(!empty($_POST['Size1']) && !empty($_POST['Size2'])){
	    
		$sz=" AND (Size BETWEEN $sz1 AND $sz2)";
		
	}
	if(!empty($_POST['Type2'])){
	     $tq=" AND Type2='$type2'";
	    
	}
	
	
	$query2= "SELECT * FROM `Post` WHERE Type1='$type1'".$roomQuery."".$areaQuery."".$pq."".$sz."".$tq." Order by Price asc, Size desc";
	
	echo $query2;
	$result=mysql_query($query2);
	//$cnt=0;
	while($r = mysql_fetch_assoc($result)) {
    $response[] = $r;
    //echo $cnt++;
    }
    print json_encode($response)
	?>
	
	
	