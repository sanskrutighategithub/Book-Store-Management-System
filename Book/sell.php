<?php
session_start();
include "dbconnect.php";
 $today = date("Y-m-d");
	
	



if(isset($_POST['submit'])){
$demo = $_POST['someInput'];
$customer = $_POST['cname'];
$mobileno = $_POST['mobno'];
$caddress = $_POST['address'];

$bookid1=$_POST['booid'];
$quanty1=$_POST['qty'];
$price=$_POST['pri'];

$bookid2=explode(",",$bookid1);
$quanty=explode(",",$quanty1);
$price1=explode(",",$price);
$a=0;

	
{
	for($i=0;$i<count($bookid2);$i++)
	{
		//echo "hii";
		$query1[$i]="select id from stockin where bookid='".$bookid2[$i]."'"; 
		$res=pg_query($db,$query1[$i]);
		
	
		while($row1=pg_fetch_row($res))
			{
				
				$sid[$i]=$row1[0];
				
			}
		$p=isset($sid[$i]);
		$r=empty($p);
		
		if(empty($p))
		{
			
				//$q8="delete from stock where s_quantity='".$a."'";
				//$e=pg_query($db,$q8);
				
			
		echo '<script language="javascript">var c= confirm("Stock not available"); if(c==true){window.location="http://localhost/Book/sell.php";} else{window.location="http://localhost/Book/sell.php";}</script>';exit();
		}
		else
		{
			$query2[$i]="select quantity from stockin where id='".$sid[$i]."'";
			$res2=pg_query($db,$query2[$i]);
		
	
		
		while($row=pg_fetch_row($res2))
			{
				$qua[$i]=$row[0];
			}
		}
		if($quanty[$i]<=$qua[$i])
		{
			if($qua[$i]==0)
		   	{
				
				echo '<script language="javascript">alert("Book not available");</script>';
				$q8="delete from stockin where id='".sid[$i]."'";
				exit();
			}
			else
			{
				$query3="update stockin set quantity='".($qua[$i]- $quanty[$i])."' where id='".$sid[$i]."'";
				$res3=pg_query($db,$query3);
			}
		}
		else
		{
			$q8="delete from stockin where quantity='".$a."'";
			$e=pg_query($db,$q8);
			echo '<script language="javascript">alert("Quantity greater than available stock");</script>';
			exit;
		}
	
		
	}

	$q="INSERT INTO sell(bookuser, name, address, mobile, total, createdon) VALUES('".$_SESSION["id"]."' ,'".$_POST['cname']."' , '".$_POST['address']."' ,'".$_POST['mobno']."','".$_POST['someInput']."' ,NOW())"; 
	$result=pg_query($db,$q);

if(!$result)
	{
		echo '<span style="color:#ff0000;text-align:center; font-size: 40pt">An oucuurred in result</span>';
	}
	
	else
	{
		
		//echo '<span style="color:#ff0000;text-align:center; font-size: 20pt">*Succesfully Inserted*</span>';

	}

$q1="SELECT sell.id from sell where name='".$_POST['cname']."'";
$result1=pg_query($db,$q1);

if(!$result1)
	{
		echo '<span style="color:#ff0000;text-align:center; font-size: 40pt">An oucuurred in result</span>';
	}
	
	else
	{
		
		//echo '<span style="color:#ff0000;text-align:center; font-size: 20pt">*Succesfully Inserted*</span>';

	}




while($row=pg_fetch_row($result1))
			{
				$sellno=$row[0];
			}

for($i=0;$i < count($bookid2);$i++)
{

	$q2="INSERT INTO selldetail(sellid, bookuser, bookid ,quantity) VALUES('".$sellno."' ,'".$_SESSION["id"]."', '".$bookid2[$i]."', '".$quanty[$i]."')";

	$result2=pg_query($db,$q2);
}
		if(!$result2)
		{
		echo '<span style="color:#ff0000;text-align:center; font-size: 40pt">An error oucuurred in result</span>';
		}
		else
		{
		$_SESSION['sno']=$sellno;
		$_SESSION['boono']=$bookid2;
		$_SESSION['quan']=$quanty;
		$_SESSION['prise']=$price1;
		echo '<script language="javascript">var r=confirm("Do you want to creat invoice?");if(r==true){window.location="http://localhost/Book/invoice.php";}</script>';
		}

}
}
?>
<html>
<head>
<title>sell</title>
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
		justify-content: center;
		margin: 0 auto;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
	

	button:hover
	{
		opacity: 0.7;
	}

	.container2
	{
		width: 100%; height: 90%; 
        padding: 40px;   
		//background-image: linear-gradient(to right,rgb(77, 184, 255),rgb(0, 122, 204));
		justify-content: center;
		 margin: 0 auto;
		 border-radius: 20px;
		// background-color:#999966;
		 
	}
	.l1
	{
			text-align: right;
			color: white;
	}
	 .topnav 
	 {
		overflow: hidden;
		background-color:#4A235A ;
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
       	background-color:#CCCCFF;
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

</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--<script type="text/javascript" src="./js/order.js"></script>-->
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


			
	<!--<form  method="POST">-->
	
	<div class="container1">
				
				<div class="part3">
					<font face="Calisto MT" size="6" color="black">Users Dashboard</font>
				</div> 
			<div class="login"  align="right"><font color="black" size="4" align="right">Welcome</font><font color="white" size="4" align="right"><?php  echo " " . $_SESSION["loginname"] . "!<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Book Store Name:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["bookstorename"]. ".<br>";?></font></div>
		<div class="login"  align="right"><font color="black" size="4" align="right">Mobile Number:</font><font color="white" size="4" align="right"><?php echo " " . $_SESSION["mobile"]. ".<br>";?></font></div>
	</div> <br>
	<form method="POST" action=" ">
		<div class="container">
			<div class="row">
				<div class="col-md-10" mx-auto>
			<div class="card" style="box-shadow:0 0 25px 0 lightgray ">
			<div class="card-header">
				</h4> New Orders</h4>
			</div>
				<div class="card-body" >
					<form onsubmit="return false">
					
						<div class="form-group-row">
								<label class="col-sm-3 col-form-label">Order date</label>
								<div class="col-sm-6" align="right"  >
										<input type="text" readonly class="form-control form-control-sm " value="<?php echo date("Y-d-m"); ?>">
								</div>
						</div>
						<div class="form-group-row">
								<label class="col-sm-3 col-form-label">Customer Name*</label>
								<div class="col-sm-6" align="right"  >
										<input type="text" class="form-control form-control-sm " value="" required placeholder="Enter Customer Name" name="cname">
								</div>
						</div>
						<div class="form-group-row">
								<label class="col-sm-3 col-form-label">Customer Mobile*</label>
								<div class="col-sm-6" align="right"  >
										<input type="tel" class="form-control form-control-sm " value="" required placeholder="Enter Customer Mobile" name="mobno">
								</div>
						</div>
						<div class="form-group-row">
								<label class="col-sm-3 col-form-label">Customer Address*</label>
								<div class="col-sm-6" align="right"  >
										<textarea rows="4" cols="50" class="form-control form-control-sm " value="" name="address"  required ></textarea>
								</div>
						</div>
						
						
						<form name="order" id="order">
    <table>
        <tr>
            <td><br>
                
				<label  for="booksid"><b>Enter Book</b></label>
            </td>
            <td>
					<select class="custom-select" name="book" id="bookid">		<option disabled selected>-- Select Book--</option>
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
                
            </td>
        </tr>
        
        <tr>
            <td>
                <label for="quantity">Quantity:</label>
            </td>
            <td>
                <input type="number" id="quantity" name="quantity" width="196px" min="0" required "/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="price">Unit Price:</label>
            </td>
            <td>
                <input type="number" id="price" name="price" size="28" required min="0" />
            </td>
        </tr>
    </table>
    <!--<input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset" />-->
	<button type="reset" value="reset" id="btn"><font size="3" face = "Times New Roman">Reset</font></button>
    <input type="button" id="btnAddProduct" onclick="addProduct();" value="Add New book" >
</form>

<br>
<p id="demo"></p> <br/>
	<h2> Shopping Cart </h2>
<p id="demo2"></p>
	<h2>Grand Total:</h2>
<p id="demo3"></p>
		
		<script>
		 var products = [];
		var cart = [];

        function addProduct() {
            var bookid = document.getElementById("bookid").value;
           
            var qty = document.getElementById("quantity").value;
            var price = document.getElementById("price").value;

            var newProduct = {
                product_id: null,
              
                product_qty: 0,
                product_price: 0.00,
            };
            newProduct.product_id = bookid;
           
            newProduct.product_qty = qty;
            newProduct.product_price = price;


            products.push(newProduct);


            var html = "<table border='1|1' >";
            html += "<td>Product ID</td>";
           
            html += "<td>Quantity</td>";
            html += "<td> Unit Price</td>";
            html += "<td>Action</td>";
			
            for (var i = 0; i < products.length; i++) {
                html += "<tr>";
                html += "<td>" + products[i].product_id + "</td>";
              
                html += "<td>" + products[i].product_qty + "</td>";
                html += "<td>" + products[i].product_price + "</td>";
                html += "<td><button type='submit' onClick='deleteProduct(\"" + products[i].product_id + "\", this);'/>Delete Item</button> &nbsp <button type='submit' onClick='addCart(\"" + products[i].product_id + "\", this);'/>Add to Cart</button></td>";
                html += "</tr>";
            }
            html += "</table>";
            document.getElementById("demo").innerHTML = html;

            document.getElementById("resetbtn").click()
        }
        function deleteProduct(product_id, e) {
            e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
            for (var i = 0; i < products.length; i++) {
                if (products[i].product_id == product_id) {
                    // DO NOT CHANGE THE 1 HERE
                    products.splice(i, 1);
                }
            }
        }

        function addCart(product_id) {

            for (var i = 0; i < products.length; i++) {
                if (products[i].product_id == product_id) {
                    var cartItem = null;
                    for (var k = 0; k < cart.length; k++) {
                        if (cart[k].product.product_id == products[i].product_id) {
                            cartItem = cart[k];
                            cart[k].product_qty++;
                            break;
                        }
                    }
                    if (cartItem == null) {
                        
                        var cartItem = {
                            product: products[i],
                            product_qty: products[i].product_qty 
                        };
                        cart.push(cartItem);
                    }
                }
            }

            renderCartTable();

        }

        function renderCartTable() {
        var html = '';
        var ele = document.getElementById("demo2");
        ele.innerHTML = ''; 

        html += "<table id='tblCart' border='1|1'>";
        html += "<tr><td>Book ID</td>";
      
        html += "<td>Quantity</td>";
        html += "<td>Unit Price</td>";
        html += "<td>Total Price</td>";
        html += "<td>Action</td></tr>";
        var GrandTotal = 0;
	
	var p_id=[];  /* here */
	var q=[];
	var p=[];
    
    for (var i = 0; i < cart.length; i++) {
            html += "<tr>";
            html += "<td>" + cart[i].product.product_id + "</td>";
			
            p_id[i]=cart[i].product.product_id;
			
            html += "<td>" + cart[i].product_qty + "</td>";
			
			q[i]=cart[i].product_qty;

            html += "<td>" + cart[i].product.product_price + "</td>";

		p[i]=cart[i].product.product_price;

            html += "<td>" + parseFloat(cart[i].product.product_price) * parseInt(cart[i].product_qty) + "</td>";
            html += "<td><button type='submit' onClick='subtractQuantity(\"" + cart[i].product.product_id + "\", this);'/>Subtract Quantity</button> &nbsp<button type='submit' onClick='addQuantity(\"" + cart[i].product.product_id + "\", this);'/>Add Quantity</button> &nbsp<button type='submit' onClick='removeItem(\"" + cart[i].product.product_id + "\", this);'/>Remove Item</button></td>";
            html += "</tr>";

           GrandTotal += parseFloat(cart[i].product.product_price) * parseInt(cart[i].product_qty);            

        }
        document.getElementById('demo3').innerHTML = GrandTotal;
        html += "</table>";
        ele.innerHTML = html;
	document.getElementById("someInput").value=GrandTotal;
	document.getElementById("booid").value = p_id;
	document.getElementById("qty").value = q;
	
	document.getElementById("pri").value=p;
    }


        function subtractQuantity(product_id)
        {
            
            for (var i = 0; i < cart.length; i++) {
                if (cart[i].product.product_id == product_id) {
                    cart[i].product_qty--;
                }

                if (cart[i].product_qty == 0) {
                    cart.splice(i,1);
                }
        
            }
            renderCartTable();
        }
        function addQuantity(product_id)
        {
            
            for (var i = 0; i < cart.length; i++) {
                if (cart[i].product.product_id == product_id) {
                    cart[i].product_qty++;
                }  
            }
            renderCartTable();
        }
        function removeItem(product_id)
        {
            
            for (var i = 0; i < cart.length; i++) {
                if (cart[i].product.product_id == product_id) {
                    cart.splice(i,1);
                }

            }
            renderCartTable();
        }
		</script>
<input type="checkbox" name="Done" value="Done" required>Done<br>
<input type="text" id="someInput" name="someInput"></input><br>
<input type="text" id="booid" name="booid"></input><br>
<input type="text" id="qty" name="qty"></input><br>
<input type="text" id="pri" name="pri"></input><br>
<input type="submit" name="submit" value="submit">

		
    </form>  </form>  
   
						<br>
						</div><br><br>
				
	 
</body>
</html>