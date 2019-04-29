

<?php

/*<html>
<head><title>Login | KosalGeek</title></head>
    <body>
        <h1>Login Example | <a href=”http://www.kosalgeek.com”>KosalGeek</a></h1>
        <form action="" method="post">
		Email <input type="text" name="pemail" value="" placeholder="Enter Current email" /><br/>
		Email <input type="text" name="email" value="" placeholder="Enter New email" /><br/>
        username <input type="text" name="username" value="" placeholder="Enter Current username" /><br/>
			
			<input type="submit" name="btnSubmit" value="Signup"/>
        </form>
	</body>
</html>*/
	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
	$pEmail=$_GET['pemail'];
	$UserID=$_GET['UserID'];
	$eQ="";
	$username=$_GET['username'];
	$uQ="";
	$fname=$_GET['fname'];
	$fnq="";
	$sname=$_GET['sname'];
	$snq="";
	$phone=$_GET['phone'];
	$pnq="";
	$photo=$_GET['photo'];
	$pq="";
	
	if(!empty($_GET['email'])) $eQ="Email = '$pEmail'";
	if(!empty($_GET['username'])){
		if(!empty($_GET['email'])) $uQ=",Username='$username'";
		else $uQ="Username='$username'";
	}
	if(!empty($_GET['fname'])){
	    if(!empty($_GET['email']) || !empty($_GET['username'])) $fnq=",First='$fname'";
		else $fnq=" First='$fname'";
	}
	if(!empty($_GET['sname'])){
	    if(!empty($_GET['email']) || !empty($_GET['username']) || !empty($_GET['fname'])) $snq=",Last='$sname'";
		else $snq="Last='$sname'";
	}
	if(!empty($_GET['phone'])){
	    if(!empty($_GET['email']) || !empty($_GET['username']) || !empty($_GET['fname']) || !empty($_GET['sname'])) $pnq=",Phone='$phone'";
		else $pnq=" Phone='$phone'";
	}
	if(!empty($_GET['photo'])){
	    if(!empty($_GET['email']) || !empty($_GET['username']) || !empty($_GET['fname']) || !empty($_GET['sname']) || !empty($_GET['phone'])) $pq=",Photo='$photo'";
		else $pq=" Photo='$photo'";
	}
	
	$query="UPDATE User SET ".$eQ.$uQ.$fnq.$snq.$pnq.$pq." WHERE UserID=$UserID";
	echo $query;
	$result=mysql_query($query);
	if($result) echo "Success";
	else "Error";
?>