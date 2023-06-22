<?php
include("functions/functions.php");
?>
<html >
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
      
      
      <div id="content_area">
      
      
        <div id="products_box"> 
		
        <?php
		if(isset($_GET['pro_id'])){
		$product_id=$_GET['pro_id'];	
		$get_pro="select* from products where product_id='$product_id'";
	$run_pro=mysqli_query($con,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro)){
$pro_id=$row_pro['product_id'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];
$pro_desc=$row_pro['product_desc'];?>

<div class="span3">
					<div class="thumbnail">
						<!-- IMAGE CONTAINER-->
						<img src="admin_area/product_images/<?php echo $pro_image?>" alt=" image">
						<!--END IMAGE CONTAINER-->
						<!-- CAPTION -->
						<div class="caption">
						<h3 class=""><?php echo $pro_title?></h3>
							<p class=""><?php echo $pro_desc?></p>
							
							<div class="row-fluid">
								<div class="span6">
									<p class="lead">&#8377;<?php echo $pro_price?></p>
								</div>
								<div class="span6">
									<a class="btn btn-success btn-block" href="index.php?add_cart=<?php echo $pro_id?>">Add to cart</a>
								</div>
							</div>
						</div> 
						<!--END CAPTION -->
					</div>
					<!-- END: THUMBNAIL -->
				</div>
<?php	}
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
