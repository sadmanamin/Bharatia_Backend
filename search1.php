

<?php
$response=array();
// include db connect class
	require_once __DIR__ . '/db_connect.php';
 
// connecting to db
	$db = new DB_CONNECT();
	$roomQuery="";
	$areaQuery="";
	$rooms=$_GET['Room_No'];
	$area=$_GET['Area'];
	$pq1=$_GET['Price1'];
	$pq2=$_GET['Price2'];
	$pq="";
	$sz1=$_GET['Size1'];
	$sz2=$_GET['Size2'];
	$sz="";
	$type1=$_GET['Type1'];
	
	$t1q="(Type1='Rent' OR Type1='Sale')";
	$tq="";
	$type2=$_GET['Type2'];
	
	if(!empty($_GET['Type1'])) $t1q="Type1='$type1'";
	
	
	
	if(!empty($_GET['Room_No'])) $roomQuery=" AND Room_No = $rooms";
	
	if(!empty($_GET['Area'])){
	     $areaQuery=" AND Area='$area'";
	 
	}
	
	if(!empty($_GET['Price1']) && !empty($_GET['Price2'])){
		
		$pq=" AND (Price BETWEEN $pq1 AND $pq2)";
		
	}
    
	if(!empty($_GET['Size1']) && !empty($_GET['Size2'])){
	    
		$sz=" AND (Size BETWEEN $sz1 AND $sz2)";
		
	}
	if(!empty($_GET['Type2'])){
	     $tq=" AND Type2='$type2'";
	    
	}
	
	
$query2= "SELECT * FROM `Post` WHERE ".$t1q.$roomQuery."".$areaQuery."".$pq."".$sz."".$tq." Order by Price asc, Size desc";
	
	//echo $query2;
	$result=mysql_query($query2);
	//$cnt=0;
	while($r = mysql_fetch_assoc($result)) {
    $response[] = $r;
    //echo $cnt++;
    }
    print json_encode($response)
	?>