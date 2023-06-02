<?php
$db = pg_pconnect("host=localhost port=5432  user=postgres dbname=bookstore password=sans");
if(!$db)
{
	echo "An error ocuurred";
	exit;
}
?>