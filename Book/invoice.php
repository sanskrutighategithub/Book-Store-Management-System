<html>

<title>Invoice</title>
<style>


	.container2
	{
		width: 60%; height: 100%; 
        padding: 80px;   
		//background-image: linear-gradient(to right,rgb(77, 184, 255),rgb(0, 122, 204));
		justify-content: center;
		 margin: 40 auto;
		 border-radius: 10px;
		background-color:#ccffff;
		 
	}

	h1
	{
		margin: -60 auto;
	}

	table 
	{
		font-family: arial, sans-serif;
		border: 1px solid black;
		width: 80%;
		margin : 100;
	}

	td, th {
		border: 1px solid black;
		//border: 1px solid #33ccff;
		text-align: left;
		padding: 8px;
		}

	

</style>

	<div class="container2">
		<h1 style="text-align:center">Invoice</h1>
<?php
	
session_start();

	include "dbconnect.php";
	$qu1="select * from sell where id='".$_SESSION['sno']."'";
	$res12=pg_query($db,$qu1);


	while($row1=pg_fetch_row($res12))
	{
		$sid=$row1[0];
		$uid=$row1[1];
		$cname=$row1[2];
		$address=$row1[3];
		$mob=$row1[4];
		$total=$row1[5];
		$date=$row1[6];
		
	}
	$uname=$_SESSION['loginname'];
	$raw=explode(' ',$date);
	$date1=date('d F Y',strtotime($raw[0]));


	$qu2="select * from selldetail where sellid='".$_SESSION['sno']."'";
	$res13=pg_query($db,$qu2);
	$mid=$_SESSION['boono'];
	$quan=$_SESSION['quan'];
	$pri=$_SESSION['prise'];
	
	for($i=0;$i<count($mid);$i++)
	{
		while($row2=pg_fetch_row($res13))
		{
			$mno[$i]=$row2[3];
			//$quan[$i]=$row2[4];
		}
	}
	
	for($i=0;$i<count($mid);$i++)
	{
		$q="select bookname from book where id='".$mid[$i]."'";
		$result12=pg_query($db,$q);
		
		while($row12=pg_fetch_row($result12))
		{	
			$mname[$i]=$row12[0];
		}
	}


		
?>

	<h3 align="right" style="margin: 80 auto">Bill No :<?php echo "$sid"?></h3>
	<h3 align="right" style="margin: -80 auto">Date :<?php echo "$date1"?></h3>
	<h3 align="right" style="margin: 80 auto">Book User Name :<?php echo "$uname"?></h3>

	<h3 align="left" style="margin: -50 auto">Customer Name :<?php echo "$cname"?></h3>
	<h3 align="left" style="margin:  50 auto">Address :<?php echo "$address"?></h3>
	<h3 align="left" style="margin: -50 auto">Mobile No :<?php echo "$mob"?></h3>

	<table>
	<tr>
		<th>Book Name</th>
		<th>Quantity</th>
		
		<th>Unit Price</th>
	</tr>
	<?php for($i=0;$i<count($mid);$i++)
	{?>
		<tr>
		<th><?php echo "$mname[$i]";?></th>
		<th><?php echo "$quan[$i]"; ?></th>
		
		<th><?php echo "$pri[$i]"; ?></th>
		</tr>
	<?php } ?>
	</table>

	<h3 align="right" style="margin: 100 auto">Total Cost :<?php echo "$total"?></h3>
	<h3 align="center" style="margin: 100 auto">Thank You For Your Order.</h3>
	<h3 align="center" style="margin: -80 auto">Please Visit Again.</h3>	
	

</div>

<a href="http://localhost/Book/home.php"><b>Go to User Home</a> &nbsp;&nbsp;















</html>