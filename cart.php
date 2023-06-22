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
  <div class="container-fluid">
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
			<li><a href="index.php">Back to shop</a></li>
			<li>
      <?php

    if(!isset($_SESSION['customer_email'])){
	
	echo"<a href='checkout.php'>Login</a>";
	
	
      }
	 else 
	 {echo"<a href='logout.php'>Logout</a>";
	 }
	 
	 ?>
			
        </ul>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <!--navigation ends-->
<!--content_wrapper starts-->
    <div class="content_wrapper">
    <div class="row">
     
      <?php getcats();
	  ?>
      </div>
      
      <div class="container-fluid" id="content_area">
      <?php cart();?>
      
    
     
      

     
      
      
        <div class ="container-fluid"id="products_box"> <br>
		
        <form action="" method="post" enctype="multipart/form-data">
	     <table class ="table table-striped">
	
		 <tr >
		 <td><b>Remove</b></td>
		 <td><b>Products</b></td>
		 <td><b>Rate</b></td>
		 </tr>
		 <?php  
		 

	
	global $con;
	$total=0;
	$ip=getip();
	$sel_price="select * from cart where ip_add='$ip'";
$run_price=mysqli_query($con,$sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id=$p_price['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($pp_price= mysqli_fetch_array($run_pro_price)){
			
			$product_price=array($pp_price['product_price']);
			$product_title=$pp_price['product_title'];
			$product_image=$pp_price['product_image'];
			$single_price=$pp_price['product_price'];
			
		$values=array_sum($product_price);
	$total+=$values;  
	
		 
		 
		 
		 ?>
		 
		 <tr>
		 <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
		 <td><?php echo $product_title;?><br>
		 <img src="admin_area/product_images/<?php echo $product_image?>" width="60px" height="60px"/></td>
	    <td ><?php echo "&#8377;".$single_price;?></td>
		 </tr>
		
		
		 
		 
		 
		 <?php }}?> 
		
		 
		 <tr >
		 <td colspan="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total amount:</b></td>
		 <td ><?php echo "&#8377;".$total;?></td>
		 </tr>
		 <tr  >
		 <td ><input class="btn btn-default" type="submit" name="update_cart" value="Update cart"/></td>
	     <td><input class="btn btn-default" type="submit" name="continue" value="Continue shopping"/></td>
		 <td><input class="btn btn-default" type="submit" name="checkout" value="Checkout"/></td>
		 <!-- <td><button class="btn btn-default"><a href="checkout.php" style="text-decoration:none ;color:black;"> Checkout</a></button/></td>-->
		  </tr>
        </table>
		</form>
<?php 

if(isset($_POST['remove'])){
	
	$ip=getip();
		if(isset($_POST['update_cart'])){
			foreach($_POST['remove'] as $remove_id){
				
	$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
$run_delete=mysqli_query($con,$delete_product);
	if($run_delete){
		
		echo"<script>window.open('cart.php','_self')</script>";	
			}
			
			
			
		}
		}	}
		
	?>
	<?php
	 if(isset($_POST['continue'])){
		 
		echo"<script>window.open('index.php','_self')</script>";	 
		 
		 
	 }	

	
	
	 ?>
	 <?php
	 if(isset($_POST['checkout'])){
		 
		 
		 
		global $con;
		$ip=getip();
$check_pro="select* from cart where ip_add='$ip'";
$run_check=mysqli_query($con,$check_pro);
if(mysqli_num_rows($run_check)>0){
	echo"";
echo"<script>window.open('checkout.php','_self')</script>";	


	}
else{
echo "<script>alert('Cart is empty')</script>";
		
echo "<script>window.open('index.php','_self')</script>";
    }

	}
		

	
	
	 ?>
	 
         </div>
        
        
      </div>
    <!--content wrapper  ends-->

    <div id="footer"><h2 style="text-align:center;padding-top:30px;">&copy;2015</h2></div>
</div>
    <!--main container ends-->
  
</body>
</html>
