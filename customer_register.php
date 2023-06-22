<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
?>
<?php 
 if(isset($_SESSION['customer_email'])){
	echo "<script> alert('You are already logged in by an account')</script>";
	echo "<script>window.open('customer/my_account.php','_self')</script>";
	
	
      }
	 else 
	 {echo"<a href='customer_register.php' style='color:white'>Logout</a>";
	 }?>
<html>
<head>

<title>Online shop</title>
<link rel="stylesheet" href="styles/responsive.css" media="all"/>
<link rel="stylesheet" href="styles/style.css" media="all"/>
<link rel="stylesheet" href="styles/bootstrap.min.css" media="all"/></head>
<body>
<!--main container starts-->
<!--header starts-->

  <div class="page-header">
  <!--<a href="index.php"><img id="logo" src="images/logo-big-shopping.png" height="100"/></a>?-->
  <img src="images/online_shop_banner.jpg"  alt="image" height="80" >
  </div>
    <!--header ends-->
    <!--navigation starts-->

<nav class="navbar navbar-inverse">
  <div >
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
		 <li><a href="all_products.php">All Products</a></li>
		  <li><a href="customer/my_account.php">My Account</a></li>
		   <li><a href="customer_register.php">Register</a></li>
		   <li><a href="cart.php">Cart</a></li>
	    </ul>
		<ul class="nav navbar-nav navbar-right">
		
		

			<li><a href="cart.php">Go to cart</a></li>
			
			<li> <?php if(!isset($_SESSION['customer_email'])){
	
	echo"<a href='checkout.php'>Login</a>";
	
	
      }
	 else 
	 {echo"<a href='logout.php'>Logout</a>";
	 }?></li>
			
        </ul>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	 
	 
    <div class="content_wrapper">
        <div class="row">
     
      <?php getcats();
	  ?>
      
      </div>
      
      
      
      <?php cart();?>
      
     
      
	<form  action="customer_register.php" method="post"
	enctype="multipart/form-data"> 


	 <div class="container">
    
	<div class="col-lg-9 well">
	<h1 class="well">Registration Form</h1>
	<div class="row">
				<form>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-8 form-group">
								<label> Name</label>
								<input type="text" name="c_name" placeholder="Enter Your Name Here.." class="form-control"required>
							</div>
							
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea name="c_address"placeholder="Enter Address Here.." rows="3" class="form-control"required></textarea>
						</div>	
						<div class="row"> 
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text"name="c_city" placeholder="Enter City Name Here.." class="form-control"required>
							</div>	
								
						<div class="col-sm-4 form-group">
						<label>Email Address</label>
						<input type="email"name="c_email" placeholder="Enter Email Address Here.." class="form-control"required>
					     </div>
                	</div>				
							
                     <div class="row">

						
					<div class="col-sm-4 form-group">
						<label>Phone Number</label>
						<input type="text" name="c_contact"placeholder="Enter Phone Number Here.." maxlength="10"class="form-control"required>
					</div>		
					</div>
					
					
					
					<div class="row">
							<div class="col-sm-4 form-group">
								<label>Password</label>
								<input type="password"name="c_pass" placeholder="Enter Password Here.." class="form-control"required>
							</div>		
						
						</div>
					<button type="submit" name="register" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
	  
	 
</form>
        
		
		
		
		
        
       </div> 
      </div>
    <!--content wrapper  ends-->

    <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2015</h2></div>
</div>
    <!--main container ends-->
  
</body>
</html>


<?php
 
if(isset($_POST['register'])){
	     $ip=getip();
	 $c_name= $_POST['c_name'];
	$c_email= $_POST['c_email'];
	 $c_pass= $_POST['c_pass'];
	
	$c_city= $_POST['c_city'];
	$c_contact= $_POST['c_contact'];
	$c_address= $_POST['c_address'];
	
	
   $insert_c="insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_city,customer_contact,customer_address)
	values('$ip','$c_name','$c_email','$c_pass','$c_city','$c_contact','$c_address')";
	
	$run_c = mysqli_query($con,$insert_c);
	
	$sel_cart="select* from cart where ip_add='$ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo "<script> alert('Registration Successful')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
	
	     }
	else
	     {   $_SESSION['customer_email']=$c_email;
		echo "<script> alert('Registration Successful')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}
		
		
}
?>







