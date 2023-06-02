<?php
session_start();

$user =$_POST['username'];
$pass=$_POST['passwords'];
$db = pg_pconnect("host=localhost port=5432  user=postgres dbname=bookstore password=sans");
if(!$db)
{
	echo "An error ocuurred";
	exit;
}else
{
	$q ="select * from bookuser where loginname='".$user."' and  passwords='".$pass."'";
	$result = pg_query($db,$q);
	$row = pg_fetch_array($result);
	if(is_array($row))
	{
		if($row[1] == $user && $row[2] == $pass )
		{
		$_SESSION["id"]= $row[0];
		$_SESSION["bookstorename"]= $row[3];
		$_SESSION["mobile"]= $row[4];
		$_SESSION["loginname"] = $user;
		echo "<B>Login Successful!!! Welcome</B>".$row[1];
		header("Location: http://localhost/Book/home.php");
		exit();

		}

	}
	else
	{
	$_SESSION["d"] = 12;
	echo '<script language="javascript">alert("Enter Correct login and Password");</script>';
	header("Location: http://localhost/Book/login.html");
	//echo '<script language="javascript">alert("Enter Correct login and Password");</script>';
	}

}
pg_close($db);
?>

