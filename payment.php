<div>
 <form action="" method="post"enctype="multipart/form-data">
	     <table class ="table table-striped" align="center" width="700" bgcolor="skyblue">
	
		 <tr>
		 <td><b>S.no</b></td>
		 <td><b>Products</b></td>

		 <td><b>Price</b></td>
		 </tr>
		 <?php  
		 

	
	global $con;
	$total=0;
	$ip=getip();
	$sel_price="select * from cart where ip_add='$ip'";
$run_price=mysqli_query($con,$sel_price);
$i=1;
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
		 <td><?php echo $i++;?>
		 <td><?php echo $product_title;?><br>
		 <img src="admin_area/product_images/<?php echo $product_image?>" width="60px" height="60px"/></td>
		 
		 
		 
		 
		 
		 <td><?php echo "&#8377;".$single_price;?></td>
		 </tr>
		 
		 
		 
		 <?php }}?>
		 
		 <tr >
		 <td colspan="2"align="right"><b>Total:</b></td>
		 <td colspan="2"><?php echo "&#8377;".$total;?></td>
		 </tr>
		 <tr align="center" >

		  <td colspan="4"><input class="btn btn-default"type="submit" name="order" value="Place order"/>
		  </td>
		  </tr>
		

</table>
</form>

</div>




<?php 


if(isset($_POST['order'])){
	$user=$_SESSION['customer_email'];
	  $get_name="select* from customers where customer_email='$user'";
	  $run_name=mysqli_query($con,$get_name);
	  $row_name=mysqli_fetch_array($run_name);
	  $c_id=$row_name['customer_id'];
	$sel_price="select * from cart where ip_add='$ip'";
$run_price=mysqli_query($con,$sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id=$p_price['p_id'];
	
	
	
   $insert_orders="insert into orders(c_id,p_id)   values('$c_id','$pro_id')";
	
	$run_orders = mysqli_query($con,$insert_orders);
	}
	
	echo "<script> alert('Order Placed')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	
}
?>