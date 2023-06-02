<head>  
<title> Home Page </title>  
<style>   
	
.topnav 
{
  overflow: hidden;
  background-color: #4A235A;
}

.container1 
{
		width: 100%;
		height:15%;
       	background-color:#CCCCFF;
} 
.topnav a 
{
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;
}

.topnav a:hover 
{
  background-color: #ddd;
  color: black;
}

.topnav a.active 
{
  background-color: #4CAF50;
  color: white<a href="http://localhost/Book/sales.php"><b>Sales</b></a> &nbsp;&nbsp;</h2>;
}

 .login
{
		width: 100%; 
}

body
	{	
		font-family: Calibri, Helvetica, sans-serif;  
 		 background-color: #ffffff;  
		
		height:100%;
		width:100%;
    	 padding: 1px;   
		justify-content: center;
		 margin: 0 auto;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
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
    <form method="POST">  
		<div class="container1">
				<div class="part3">
						<font face="Calisto MT" size="6" color="black">Users Dashboard</font>
				</div> 
			<div class="login"  align="right"><font color="black" size="4" align="right">Welcome</font><font color="white" size="4" align="right"><?php session_start(); echo " " . $_SESSION["loginname"] . "!<br>";?></font></div>
			<div class="login"  align="right"><font color="black" size="4" align="right">Book Store Name:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["bookstorename"]. ".<br>";?></font></div>
			<div class="login"  align="right"><font color="black" size="4" align="right">Mobile Number:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["mobile"]. ".<br>";?></font></div>
		</div> 
		
    </form>  

</body>     
</html>  

