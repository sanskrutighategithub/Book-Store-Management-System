<?php 
session_start();
include "dbconnect.php"; 
$z=0;



$q2="delete from stockin where stockin.quantity = '".$z."'";
			$result2=pg_query($db,$q2);	
			



$q = "SELECT stockin.id,stockin.bookuserid,book.bookname,stockin.quantity,stockin.unitcost,stockin.createdon FROM stockin,book where stockin.bookid = book.id and bookuserid= '" .$_SESSION['id']."'";

$result = pg_query($db,$q);
?> 

<html> 
<head> 
<title>Show Stock</title>
    <!-- CSS FOR STYLING THE PAGE --> 
    <style> 
	
	body
	{	
		font-family: Calibri, Helvetica, sans-serif;  
 		// background-color:#ffffff;  
		
		width:100%;
		height:90%;
        padding: 1px;   
      	background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	
	
	table 
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 80%;
	}

	td, th {
		border: 1px solid #dddddd;
		//border: 1px solid #33ccff;
		text-align: left;
		padding: 8px;
		}

	tr:nth-child(even) {
		background-color: #C39BD3;
	}
	.topnav {
  overflow: hidden;
  background-color: #4A235A;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 14px;
  text-decoration: none;
  font-size: 14px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.container1 
	{
		width: 100%;
		height:15%;
       	background-color:#CCCCFF ;
    } 
	 .login
	 {
		width: 100%; 
	 }
	.part3
	{
		width:500px;
		//height:300px;
		padding: 1px ;
		 position: absolute;
		// background-repeat: no-repeat;
		//background-image: url('33.jpg');
		//right: 50%;
		margin: 40px 0 0 40px ;
	} 
	.topnav {
  overflow: hidden;
  background-color: #333;
}
    </style> 
</head> 
  
<body> 
<div class="topnav">
  <a href="http://localhost/Book/home.php"><b>Home</a> &nbsp;&nbsp;
			<a href="http://localhost/Book/addstockin.php"><b>Add Stock</b></a> &nbsp;&nbsp;
			<a href="http://localhost/Book/remove.php"><b>Remove Stock</b></a> &nbsp;&nbsp;
			<a href="http://localhost/Book/showstock.php"><b>Show Stock</b></a> &nbsp;&nbsp;</h2>
			<a href="http://localhost/Book/sell.php"><b>Sell</b></a> &nbsp;&nbsp;</h2>
			
			<a href="http://localhost/Book/login.html"><b>Log out</b></a> &nbsp;&nbsp;</h2>
</div> 

<center>
<div class="container1">
		<div class="part3">
			<font face="Calisto MT" size="6" color="black">Users Dashboard</font>
		</div> 
		<
		<div class="login"  align="right"><font color="black" size="4" align="right">Welcome</font><font color="white" size="4" align="right"><?php  echo " " . $_SESSION["loginname"] . "!<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Bookstore Name:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["bookstorename"]. ".<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Mobile Number:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["mobile"]. ".<br>";?></font></div>
	 </div> <br>


    <section> 
        <h1>Stock In Records</h1> 
        <!-- TABLE CONSTRUCTION--> 
        <table> 
            <tr> 
                <th>Stock ID</th> 
                <th>User id</th> 
                <th>Bookname</th> 
                <th>Quantiy</th> 
				<th>Unit Cost</th>
				<th>Entry Date</th>
				
				
            </tr> 


            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   
                while($row = pg_fetch_assoc($result)) 
                { 
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $row['id'];?></td> 
                <td><?php echo $row['bookuserid'];?></td> 
                <td><?php echo $row['bookname'];?></td> 
                <td><?php echo $row['quantity'];?></td> 
	<td><?php echo $row['unitcost'];?></td> 
	<?php 
		$raw = $row['createdon'];
		$e = explode(' ',$raw);
		$date=date('d F Y',strtotime($e[0]));
	?>
	<td><?php echo "$date";?></td> 


	
            </tr> 
            <?php 
                } 
             ?> 
        </table> 
    </section> 
	
</body> 
  
</html> 