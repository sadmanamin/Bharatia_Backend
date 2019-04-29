<html>
<head><title>Login | KosalGeek</title></head>
    <body>
        <h1>Login Example | <a href=”http://www.kosalgeek.com”>KosalGeek</a></h1>
        <form action="" method="post">
		Current Email <input type="text" name="email" value="" placeholder="Enter Current Password" /><br/>
            Current Password <input type="text" name="curPas" value="" placeholder="Enter Current Password" /><br/>
			New Password <input type="text" name="newP1" value="" placeholder="Enter New Password" /><br/>
			Re Type Password <input type="text" name="newP2" value="" placeholder="Enter New Password Again" /><br/>
			<input type="submit" name="btnSubmit" value="Signup"/>
        </form>
	</body>
</html>

<?php
	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
	$email=$_POST['email'];
	$curPas=$_POST['curPas'];
	$newP1=$_POST['newP1'];
	$newP2=$_POST['newP2'];
	
	$chk=mysql_query("SELECT Password FROM `User` WHERE Email='$email' AND Password='$curPas'");
	if($chk){
		if($newP1==$newP2){
			$q=mysql_query("UPDATE User SET Password='$newP1' WHERE Email='$email'");
			if($q) echo "Success";
			else "Password update failed";
		}
		else echo "New passwords doesnt match";
	}
	else echo "Current password didnt match";
?>