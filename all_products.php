<?php 
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html >
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
      <?php cart();?>
      
 
        <div id="products_box">  
       
		
		<?php getallpro()?>
       <?php getcatpro()?>
         <?php getbrandpro()?>
		
        
         </div>
        
        
      </div></div>
    <!--content wrapper  ends-->

    <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2015</h2></div>
</div>
    <!--main container ends-->
  
</body>
</html>



