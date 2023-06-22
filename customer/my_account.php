<?php 
session_start();
include("../functions/functions.php");
?>
<?php if(isset($_SESSION['customer_email'])){
		 echo "";
	  }
	  else {
	echo "<script>alert('Please login!!')</script>";
			echo "<script>window.open('../checkout.php','_self')</script>";
	  }  ?>
<html >
<head>

<title>Online shop</title>
<link rel="stylesheet" href="../styles/responsive.css" media="all"/>
<link rel="stylesheet" href="../styles/style.css" media="all"/>
<link rel="stylesheet" href="../styles/bootstrap.min.css" media="all"/></head>
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
        <li><a href="../index.php">Home</a></li>
		 <li><a href="../all_products.php">All Products</a></li>
		  <li><a href="my_account.php">My Account</a></li>
		   <li><a href="../customer_register.php">Register</a></li>
		   <li><a href="../cart.php">Cart</a></li>
	    </ul>
		<ul class="nav navbar-nav navbar-right">
		
		

			<li><a href="../cart.php">Go to cart</a></li>
			
			<li> <?php if(!isset($_SESSION['customer_email'])){
	
	echo"<a href='checkout.php'>Login</a>";
	
	
      }
	 else 
	 {echo"<a href='logout.php'>Logout</a>";
	 }?></li>
			
        </ul>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><?php
	  $user=$_SESSION['customer_email'];
	  $get_name="select* from customers where customer_email='$user'";
	  $run_name=mysqli_query($con,$get_name);
	  $row_name=mysqli_fetch_array($run_name);
	  $c_name=$row_name['customer_name'];
	  ?>
    <div class="content_wrapper"> 
        <div class="row">
      <div class="col-sm-4 col-md-3">
 <h3>My Account</h3>
 
 <div class="list-group">
	 
	   <a href="my_account.php?my_orders"class="list-group-item">View orders</a>
	  <a href="my_account.php?edit_account"class="list-group-item">Edit account</a>
	  <a href='logout.php'class="list-group-item">Logout</a>
	  
      </div>
	 
      </div>
      
      
      <div  id="content_area">
      <?php cart();?>
      
      


     
      
        <div class="container-fluid" id="products_box">  
      
		<?php
		if(!isset($_GET['my_orders'])){
			if(!isset($_GET['edit_account'])){
				
					
					
					 
					echo " <h2 style='padding:20px;'>Welcome $c_name</h2>
					
					 <a class='btn btn-lg btn-info'  href='my_account.php?my_orders' >Click here to view your orders</a>";
					
					
				
					 
			}
		}
		?>
         
		 <?php
		 if(isset($_GET['edit_account'])){
			 include("edit_account.php");
			  }
			  
			  
			   if(isset($_GET['my_orders'])){
			 include("my_orders.php");
			 
			 
			  }
		 ?>
		 
		 
        
         </div>
        
        
      </div></div>
    <!--content wrapper  ends-->

    <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2015</h2></div>
</div>
    <!--main container ends-->
  
</body>
</html>
  
  
  
  <?php
if(isset($_POST['update'])){
	//$ip=getip();
	
	$customer_id=$_GET['c_id'];
	$c_name=$_POST['c_name'];
	$c_email=$_POST['c_email'];
	$c_pass=$_POST['c_pass'];
	
	$c_city=$_POST['c_city'];
	$c_contact=$_POST['c_contact'];
	$c_address=$_POST['c_address'];
	
	
   $update_c="update customers set customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address'
   where customer_id='$customer_id'";
	
	$run_update = mysqli_query($con,$update_c);
		if($run_update){
			echo "<script>alert('Account updated')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";		
			
		}
			 
			 
			 }
?>