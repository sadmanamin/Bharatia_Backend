
<?php

$response = array();

	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    $PostID=$_GET['PostID'];
	$Room=$_GET['Room'];
	$rQ="";
	$Size=$_GET['Size'];
	$szQ="";
	$Price=$_GET['Price'];
	$prQ="";
	$Area=$_GET['Area'];
	$aQ="";
	$Address=$_GET['Address'];
	$adQ="";
	$Description=$_GET['Description'];
	$desQ="";
	$Phone_No=$_GET['Phone_No'];
	$phQ="";
	$Email=$_GET['Email'];
	$emQ="";
	$Availability=$_GET['Availability'];
	$avQ="";
	$Lat=$_GET['Lat'];
	$latQ="";
	$Lon=$_GET['Lon'];
	$lonQ="";
	$Type1=$_GET['Type1'];
	$tp1="";
	$Type2=$_GET['Type2'];
	
	if(!empty($_GET['Room'])) $rQ="Room_No = $Room";
	
	if(!empty($_GET['Size'])){
	    
	 if(!empty($_GET['Room'])) $szQ=",Size=$Size";
	 else $szQ=" Size='$Size'";
	}
	
	if(!empty($_GET['Price'])){
	    
	 if(!empty($_GET['Room']) || !empty($_GET['Size'])) $prQ=",Price=$Price";
	 else $prQ=" Price=$Price";
	}
	
	if(!empty($_GET['Area'])){
	    
	 if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price'])) $aQ=", Area='$Area'";
	 else $aQ=" Area='$Area'";
	}
	
	if(!empty($_GET['Address'])){
	    
	 if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Area'])) $adQ=",Address='$Address'";
	 else $adQ=" Address='$Address'";
	}
	if(!empty($_GET['Description'])){
	    
	 if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area'])) $desQ=",Description='$Description'";
	 else $desQ=" Description='$Description'";
	}
	if(!empty($_GET['Phone_No'])){
	    
	 if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area']) || !empty($_GET['Description'])) $phQ=",Phone_No='$Phone_No'";
	 else $phQ=" Phone_No='$Phone_No'";
	}
	if(!empty($_GET['Email'])){
	    
	 if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area']) || !empty($_GET['Description']) || !empty($_GET['Phone_No'])) $emQ=",Email='$Email'";
	 else $emQ=" Email='$Email'";
	}
	if(!empty($_GET['Availability'])){
	if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area']) || !empty($_GET['Description']) || !empty($_GET['Phone_No']) || !empty($_GET['Email'])) $avQ=",Availability=$Availability";
	 else $avQ=" Availability=$Availability";
	    
	}
	
	if(!empty($_GET['Lat']) && !empty($_GET['Lat'])){
	if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area']) || !empty($_GET['Description']) || !empty($_GET['Phone_No']) || !empty($_GET['Email']) || !empty($_GET['Availability'])) $latQ=",Lat=$Lat,Lon=$Lon";
	 else $latQ="Lat=$Lat,Lon=$Lon";
	    
	}
	
	if(!empty($_GET['Type1'])){
	    if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area']) || !empty($_GET['Description']) || !empty($_GET['Phone_No']) || !empty($_GET['Email']) || !empty($_GET['Availability']) || !empty($_GET['Lat']) || !empty($_GET['Lat'])) $tp1=" , Type1='$Type1'";
	    else $tp1=" Type1='$Type1'";
	}
	
	if(!empty($_GET['Type2'])){
	    if(!empty($_GET['Room']) || !empty($_GET['Size']) || !empty($_GET['Price']) || !empty($_GET['Address']) || !empty($_GET['Area']) || !empty($_GET['Description']) || !empty($_GET['Phone_No']) || !empty($_GET['Email']) || !empty($_GET['Availability']) || !empty($_GET['Lat']) || !empty($_GET['Lat']) || !empty($_GET['Type1'])) $tp2=" , Type2='$Type2'";
	    else $tp2=" Type2='$Type2'";
	}
	
	$query="UPDATE `Post` SET ".$rQ.$szQ.$prQ.$aQ.$adQ.$desQ.$phQ.$emQ.$avQ.$latQ.$tp1.$tp2." WHERE PostID=$PostID";
	echo $query;
	$result=mysql_query($query);
	
	if($result) echo "Success";
	else echo "Update failed";
	
	
	?>
	
	
	