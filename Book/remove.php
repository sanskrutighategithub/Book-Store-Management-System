<?php 
session_start();
include "dbconnect.php"; 
if(isset($_POST['submit']))
{
	$q =" delete  from stockin where id ='". $_POST['iddel']."' ";
	$result = pg_query($db,$q);
	if(!$result)
	{
		echo '<span style="color:#ff0000;text-align:center; font-size: 20pt">error</span>';
	}
	
	else
	{
		
		echo '<span style="color:#ff0000;text-align:center; font-size: 20pt">*Succesfully Removed*</span>';

	}

}
?>
<html>
<head>
<title>Add Stock</title>
<style>
	
	.topnav 
	{
		overflow: hidden;
		background-color: #333;
	}
	body
	{	
		font-family: Calibri, Helvetica, sans-serif;  
		
 		background-color: #FFFFFF;  
		height:70%;
		width:100%;
    	padding: 1px;   
		//justify-content: center;
		margin: 0 auto;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	button 
	{   
       		background-color:  ; 
     		width: 40%;  
			height: 8%; 
			padding: 3px;   
       		margin: 8px 0px;   
       		cursor: pointer;  
			border-radius: 3px;
 	 }   
	
	button:hover
	{
		opacity: 0.6;
	}

	input[type=number]
	{
			width: 80%;  
			height:8%;
   		     margin: 8px 0;  
     		 padding: 12px 20px;   
       		 display: inline-block; 
			font-weight: bold;
			
			
	}

	

	.container 
	{
		width: 30%; height: 52%; 
        padding: 40px;   
		position: absolute;
		background-image: linear-gradient(to right,rgb(46,8,65) ,rgb(127, 74, 152));
		justify-content: right;
		margin: 0 auto;
		border-radius: 20px;
		
	 } 
	.out1
	{width: 100%; height: 100%;   
		background-image: linear-gradient(to right,rgb(230, 230, 230),rgb(230, 230, 230));
		
		}
		
		
   .part6
	{
		width:1000px;
		height:740px;
		
		
		text-align: left;
		 position: absolute;
		
		 position: absolute;
		 background-repeat: no-repeat;
		 background-image: url('111.jpg');
		 background-size: 1000px 454px;
		left: 35%;
		margin: 0 0 0 0px ;
	} 
	.l1
	{
			text-align: right;
			color: white;
	}
	 .topnav 
	 {
		overflow: hidden;
		background-color: #4A235A;
	}
	.topnav a 
	{
		float: left;
		color: #f2f2f2;
		text-align: center;
		padding: 12px 14px;
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
		color: white;
	}
	.container1 
	{
		width: 100%;
		height:20%;
       	background-color:#CCCCFF ;
    } 
	 .login
	 {
		width: 100%; 
	 }
	.part3
	{
		width:500px;
		height:500px;
		padding: 1px ;
		 position: absolute;
		
		//right: 50%;
		margin: 40px 0 0 40px ;
	} 
	.topnav {
  overflow: hidden;
  background-color: #333;
}
$primary: #11998e;
$secondary: #38ef7d;
$white: #fff;
$gray: #9b9b9b;
.form__group {
  position: relative;
  padding: 15px 0 0;
  margin-top: 10px;
  width: 50%;
}

.form__field {
  font-family: inherit;
  width: 100%;
  border: 0;
  border-bottom: 2px solid $gray;
  outline: 0;
  font-size: 1.3rem;
  color: $white;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;

  &::placeholder {
    color: transparent;
  }

  &:placeholder-shown ~ .form__label {
    font-size: 1.3rem;
    cursor: text;
    top: 20px;
  }
}

.form__label {
  
  color:#FFFFFF;
}


.form__field:focus {
  ~ .form__label {
    position: absolute;
    top: 0;
    display: block;
    transition: 0.2s;
    font-size: 1rem;
    color: $primary;
    font-weight:700;    
  }
  padding-bottom: 6px;  
  font-weight: 700;
  border-width: 3px;
  border-image: linear-gradient(to right, $primary,$secondary);
  border-image-slice: 1;
}
/* reset input */
.form__field{
  &:required,&:invalid { box-shadow:none; }
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


			
	<form  method="POST">
	<div class="container1">
		
		<div class="part3">
			<font face="Calisto MT" size="6" color="black">Users Dashboard</font>
		</div> 
		
		
		
		<div class="login"  align="right"><font color="black" size="4" align="right">Welcome</font><font color="white" size="4" align="right"><?php  echo " " . $_SESSION["loginname"] . "!<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Bookstore Name:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["bookstorename"]. ".<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Mobile Number:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["mobile"]. ".<br>";?></font></div>
	</div> <br>

	<div class="out1">
		<div class="container">
			<font  size="6" face = "Times New Roman" color="white">Remove Stock</font><hr><br>
			<div class="form__group field"> 
				<label class="form__label" ><b>Stock Id for Remove</b></label> <br>
				<input type="number" class="form__field" placeholder="Enter id"  name="iddel" value=" " min="1" required >  
			
			<br><br>
			<button type="submit" value="submit" name="submit" id="btn"><font size="5" face = "Times New Roman">Submit</font></button><br>
			<button type="reset" value="reset" id="btn"><font size="5" face = "Times New Roman">Reset</font></button>	
			</div>
			
	
		
	</div>
	 <div class = "part6"> 
		
			</div>
	
	
	
	</div>
	
	
</form>
</body>
</html>