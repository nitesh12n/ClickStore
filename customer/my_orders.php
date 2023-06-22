<?php
include("includes/db.php");


      ?>
	     <table class=" table-striped" align="center" width="750" >
	
		 <tr align="center">
		<td><b>Order no</b></td>
		 <td><b>Products</b> </td>

		 <td><b>Total Price</b></td>
		 </tr>
		 
	
		 <?php  
		 

	
	global $con;
	$total=0;
	$ip=getip(); 
	
       $user=$_SESSION['customer_email'];
	  $get_customer="select* from customers where customer_email='$user'";
	  $run_customer=mysqli_query($con,$get_customer);
	  $row_customer=mysqli_fetch_array($run_customer);
	 

	 $c_id=$row_customer['customer_id'];
	
	$sel_price="select * from orders where c_id='$c_id'";
$run_price=mysqli_query($con,$sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		
		$order_id=$p_price['order_id'];
		$pro_id=$p_price['p_id'];
		$pro_price="select * from products where product_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($pp_price= mysqli_fetch_array($run_pro_price)){
			

			$product_title=$pp_price['product_title'];
			$product_image=$pp_price['product_image'];
			$single_price=$pp_price['product_price'];
			
		 
		 
		 
		 ?>
		 <tr align="center">
		 <td><?php echo $order_id;?>
		 <td><?php echo $product_title;?><br>
		 <img src="../admin_area/product_images/<?php echo $product_image?>" width="60px" height="60px"/></td>
	
		 <td><?php echo "&#8377;".$single_price;?></td>
		 </tr>
		 
		 
		 
		 <?php }}?>
		 </table>
		
		 