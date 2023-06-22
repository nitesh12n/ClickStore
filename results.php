<?php
include("functions/functions.php");
?>
<!DOCTYPE html >
<html >
<head>

<title>Online shop</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--main container starts-->
<div class="main_wrapper">
<!--header starts-->

  <div class="header_wrapper">
 <!-- <a href="index.php"><img id="logo" src="images/logo-big-shopping.png" height="100"/></a>-->

  <img src="images/online_shop_banner.jpg"  alt="image" width="1226"
  height="100" >
    
    </div>
    <!--header ends-->
    <!--navigation starts-->


    <div class="menu_bar">
    <ul id="menu">
  <li><a href="index.php">Home</a></li>
  <li><a href="all_products.php">Products</a></li>
  <li><a href="customer/my_account.php">My Account</a></li>
  <li><a href="#signup">Sign up</a></li>
  <li><a href="cart.php">Cart</a></li>
  <li><a href="#Contact">Contact Us</a></li>
  
  
</ul>
<div id="form">
<form method="get" action="results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Search"/>
<input type="submit" name="search" value="Search"/>
</form>

</div>
    </div>
    <!--navigation ends-->
<!--content_wrapper starts-->
    <div class="content_wrapper">
    
      <div id="sidebar">
      <div id="sidebar_title">Categories</div>
      <ul id="cats">
      <?php getcats();
	  ?></ul>
    
       <div id="sidebar_title">Brands</div>
      <ul id="cats">
      <?php getbrands();?>
      
      </ul>
      </div>
      
      
      
      
      <div id="content_area">
      <div id="shopping_cart">
      <span style="float:right;font-size:18px;padding:5px;line-height:40px;">Welcome Guest        <b style="color:yellow;">Shopping Cart-</b>Total Items: Total Price:
      
<a style="color:yellow;"href="cart.php">&nbsp;Go to cart</a>
      
      </span>
      </div>
       
      
        <div id="products_box">  
      <?php
	  if(isset($_GET['search'])){
		  
		  $search_query=$_GET['user_query'];
	
	$get_pro="select* from products where product_keywords like '%$search_query%'";
	$run_pro=mysqli_query($con,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro)){
$pro_id=$row_pro['product_id'];
$pro_cat=$row_pro['product_cat'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];

echo"
<div id='single_product'>
<h3>$pro_title</h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>&#8377;$pro_price</b></p>


<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
<a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to cart</button></a>

</div>




";
	}
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
