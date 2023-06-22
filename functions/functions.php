<?php
$con=mysqli_connect("localhost","root","","onlineshopping");

        if(mysqli_connect_errno())
        {
            echo "Failed to connect" . mysql_error();
		}
function getip() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
		
		
function cart(){
	if(isset($_GET['add_cart'])){
		global $con;
		$ip=getip();
$pro_id=$_GET['add_cart'];
$check_pro="select* from cart where ip_add='$ip' AND p_id='$pro_id'";
$run_check=mysqli_query($con,$check_pro);
if(mysqli_num_rows($run_check)>0){
	echo"";
echo "<script>alert('This product is already in the cart')</script>";
			echo "<script>window.open('index.php','_self')</script>";



	}
else{
	$insert_pro="insert into cart(p_id,ip_add,qty) values('$pro_id','$ip',1)";
$run_pro=mysqli_query($con,$insert_pro);
echo "<script>alert('Product added')</script>";
		
echo "<script>window.open('index.php','_self')</script>";
    }

	}
}



function total_items(){
	
if(isset($_GET['add_cart'])){
	global $con;
	$ip=getip();
	
	$get_items="select* from cart where ip_add='$ip'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
      } 
else  {
	global $con;
	$ip=getip();
	
	
	$get_items="select* from cart where ip_add='$ip'";
$run_items=mysqli_query($con,$get_items);
$count_items=mysqli_num_rows($run_items);
}
	
	echo $count_items;
	
}	

function total_price(){
	
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
		$values=array_sum($product_price);
	$total+=$values;
		}
			
		
	}
	echo $total;
}

		

//get categories

function getcats(){


 echo"<div class='col-sm-4 col-md-3'>
 <h3>Categories</h3>
 
 <div class='list-group'> ";
global $con;	
$get_cats="select* from categories";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){
$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];
	
	

 
 
echo "<a href='index.php?cat=$cat_id'class='list-group-item'>$cat_title</a>";
}

 
echo"
 <h3>Brands</h3>
 
 <div class='list-group'> ";
global $con;	
$get_cats="select* from brands";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){
$brand_id=$row_cats['brand_id'];
$brand_title=$row_cats['brand_title'];
	
	

 
 
echo "<a href='index.php?brand=$brand_id'class='list-group-item'>$brand_title</a>";
}

 
 echo"</div>
 </div>";
}







function getpro(){
	if(!isset($_GET['cat']))
	{
		if(!isset($_GET['brand'])){
	
	
	global $con;
	$get_pro="select* from products order by RAND() LIMIT 0,6";
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
<h4>$pro_title</h4>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>Price: &#8377;$pro_price</b></p>


<a class='btn btn-default'href='details.php?pro_id=$pro_id' style='float:left;padding:5px'>Details</a>
<a href='index.php?add_cart=$pro_id'><button class='btn btn-default'style='float:right;padding:5px'>Add to cart</button></a>

</div>




";
	}
	}
 }
}


function getallpro(){
	if(!isset($_GET['cat']))
	{
		if(!isset($_GET['brand'])){
	
	
	global $con;
	$get_pro="select* from products order by RAND()";
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
<p><b>Price: &#8377;$pro_price</b></p>


<a class='btn btn-default'href='details.php?pro_id=$pro_id' style='float:left;padding:5px'>Details</a>
<a href='index.php?add_cart=$pro_id'><button class='btn btn-default'style='float:right;padding:5px'>Add to cart</button></a>
</div>




";
	}
	}
 }
}





function getcatpro(){
	if(isset($_GET['cat']))
	{
		$cat_id=$_GET['cat'];
	
	
	global $con;
	$get_cat_pro="select* from products where product_cat='$cat_id'";
	$run_cat_pro=mysqli_query($con,$get_cat_pro);
	$count_cats=mysqli_num_rows($run_cat_pro);
	if($count_cats==0){
		
		echo "<script>alert('Sorry!! No Product is available in this category')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		
		
          }
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
$pro_id=$row_cat_pro['product_id'];
$pro_cat=$row_cat_pro['product_cat'];
$pro_brand=$row_cat_pro['product_brand'];
$pro_title=$row_cat_pro['product_title'];
$pro_price=$row_cat_pro['product_price'];
$pro_image=$row_cat_pro['product_image'];


echo"
<div id='single_product'>
<h3>$pro_title</h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>&#8377;$pro_price</b></p>


<a class='btn btn-default'href='details.php?pro_id=$pro_id' style='float:left;padding:5px'>Details</a>
<a href='index.php?add_cart=$pro_id'><button class='btn btn-default'style='float:right;padding:5px'>Add to cart</button></a>
</div>




";
	}
	
 }
}



function getbrandpro(){
	if(isset($_GET['brand']))
	{
		$brand_id=$_GET['brand'];
	
	
	
	global $con;
	$get_brand_pro="select* from products where brand_id='$brand_id'";
	$run_brand_pro=mysqli_query($con,$get_brand_pro);
	$count_brand=mysqli_num_rows($run_brand_pro);
	if($count_brand==0){
	echo "<script>alert('Sorry!! No Product is available for this brand')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		
          }
	while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
$pro_id=$row_brand_pro['product_id'];
$pro_cat=$row_brand_pro['product_cat'];
$pro_brand=$row_brand_pro['brand_id'];
$pro_title=$row_brand_pro['product_title'];
$pro_price=$row_brand_pro['product_price'];
$pro_image=$row_brand_pro['product_image'];


echo"
<div id='single_product'>
<h3>$pro_title</h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>&#8377;$pro_price</b></p>


<a class='btn btn-default'href='details.php?pro_id=$pro_id' style='float:left;padding:5px'>Details</a>
<a href='index.php?add_cart=$pro_id'><button class='btn btn-default'style='float:right;padding:5px'>Add to cart</button></a>

</div>




";
	}
	
 }
}


?>






