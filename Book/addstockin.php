<?php 
session_start();
include "dbconnect.php"; 
if(isset($_POST['submit']))
{
	$q = "INSERT INTO stockin (bookuserid, bookid, quantity, unitcost, createdon) VALUES ('" .$_SESSION['id']."' ,'". $_POST['book']."' , ' " .$_POST['quantity']. " ', ' " .$_POST['cost']. " ', NOW())";
	$result = pg_query($db,$q);
	if(!$result)
	{
		echo '<span style="color:#ff0000;text-align:center; font-size: 20pt">error</span>';
	}
	
	else
	{
		
		echo '<span style="color:#ff0000;text-align:center; font-size: 20pt">*Succesfully Inserted*</span>';

	}

}
?>
<?php 

$q = "SELECT book.id,book.bookname,book.description,booktype.type, book.author FROM book,booktype where book.booktypeid = booktype.id ";

$result = pg_query($db,$q);
?> 
<html>
<head>
<title>Add Stock</title>
<style>
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
	.container 
	{
		width: 35%; height: 63%; 
        padding: 40px;   
		position: absolute;
		background-image: linear-gradient(to right,rgb(46,8,65) ,rgb(127, 74, 152));
		justify-content: right;
		margin: 0 auto;
		border-radius: 20px;
		
	 } 
	.out1
	{width: 100%; height: 60%;   
		background-image: linear-gradient(to right,rgb(230, 230, 230),rgb(230, 230, 230));
		
		}
	.l1
	{
			text-align: right;
			color: white;
	}
	.custom-select {
			display: block;
			font-size: 16px;
			font-family: sans-serif;
			font-weight: 700;
			color: #444;
			line-height: 1.3;
			padding: .5em 1.1em .4em .7em;
			width: 70%;
			max-width: 90%; /* useful when width is set to anything other than 100% */
			
			margin: 0;
			border: 1px solid #aaa;
			box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
			border-radius: .5em;
			-moz-appearance: none;
			-webkit-appearance: none;
			appearance: none;
			background-color: #fff;
 }
 .topnav {
  overflow: hidden;
  background-color: #333;
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
       	background-color:#CCCCFF;
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

	
* 
{
  box-sizing: border-box;
}

#myInput
{
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 70%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable 
{
  border-collapse: collapse;
  width: 60%;
 // border: 1px solid #ddd;
	border: 3px solid #3E045F;
  font-size: 18px;
 
}

#myTable th, #myTable td 
{
  text-align: left;
  padding: 12px;
  //column-width: 40px;
}

#myTable tr 
{
 // border-bottom: 1px solid #ddd;
  border-bottom: 3px solid #3E045F;
}

#myTable tr.header, #myTable tr:hover
{
  background-color: #B279D3;
}
.container2
	{
		width: 100%;
		height:100%;
       	background-color:F7FEFD;
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
		margin: 1px 0 0 1px ;
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
		<div class="login"  align="right"><font color="black" size="4" align="right">Book Store Name:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["bookstorename"]. ".<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Mobile Number:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["mobile"]. ".<br>";?></font></div>
	</div> <br>
	<div class="out1">
		<div class="container">
		
				<font  size="6" face = "Times New Roman" color="white">Add Stock</font><hr>
				<label class="l1" for="book"><b>Enter Book</b></label>		<select class="custom-select" name="book">		<option disabled selected>-- Select Book--</option>
									<?php
											include "dbconnect.php"; 
										$q ="select id,bookname from book;";
										$records = pg_query($db,$q);
										while($row = pg_fetch_array($records))
										{
											echo "<option value='".$row['id']."'><b>".$row['bookname']."</b></option>";  // displaying data in option menu
										}
									?>  
								</select>
			
		<br>
			 <label class="l1" for ="quantity"><b>Quantity</b></label>
					<input type="number" name="quantity" value=" " min="0" placeholder="Enter quantity" required> <br>&nbsp; 
		<br>
			<label  class="l1" for ="cost"><b>Unit Cost</b>
					<input type="number" name="cost" value=" " min="0" placeholder="Unit cost" required><br><br>
		<br>				
			
						
					<button type="submit" value="submit" name="submit" id="btn"><font size="4" face = "Times New Roman" color="black">Submit</font></button>&nbsp; 
					<br>
					<button type="reset" value="reset" id="btn"><font size="4" face = "Times New Roman" color="black">Reset</font></button>
						
			
						
				</div>
				
				  <div class = "part6"> 
		
			</div>
		   
				</div>
		<br>
<div class="container2 "><center>
 <section> 
        <font face="Calisto MT" size="6" color="black">Book Details</font><br><br>
        <!-- TABLE CONSTRUCTION--> 
		
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		
        <table id="myTable">
            <tr> 
               
                <th>Name</th> 
                <th>Description</th> 
                <th>Book Type</th> 
			
            </tr> 


            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   
                while($row = pg_fetch_assoc($result)) 
                { 
             ?> 
            <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
               
                <td><?php echo $row['bookname'];?></td> 
                <td><?php echo $row['description'];?></td> 
                <td><?php echo $row['type'];?></td> 
				
	
            </tr> 
            <?php 
                } 
             ?> 
        </table> 
    </section> 
	<center>
</div>
</form>
<script>
function myFunction() 
{
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) 
  {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) 
    {
      	txtValue = td.textContent || td.innerText;
      	if (txtValue.toUpperCase().indexOf(filter) > -1) 
      	{
       		 tr[i].style.display = "";
      	} 
        else
      	{
        	tr[i].style.display = "none";
     	 }
    }       
  }
}
</script>

</body>
</html>