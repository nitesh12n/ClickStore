<?php
include("includes/db.php");


       $user=$_SESSION['customer_email'];
	  $get_customer="select* from customers where customer_email='$user'";
	  $run_customer=mysqli_query($con,$get_customer);
	  $row_customer=mysqli_fetch_array($run_customer);
	 

	 $c_id=$row_customer['customer_id'];
	  $name=$row_customer['customer_name'];
	   $email=$row_customer['customer_email'];
	    $pass=$row_customer['customer_pass'];
		 $country=$row_customer['customer_country'];
		   $city=$row_customer['customer_city'];
		   $contact=$row_customer['customer_contact'];
		   $address=$row_customer['customer_address'];
		 
	  
	?>  
	  
	  
	  

<form  action="my_account.php?c_id=<?php echo $c_id;?>" method="post"
	enctype="multipart/form-data">

	 <div class="container">
    <h1 class="well">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit ur Account</h1>
	<div class="col-lg-10 well">
	<div class="row">
				<form>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-8 form-group">
								<label> Name</label>
								<input type="text" name="c_name" value="<?php echo $name?>" placeholder="Enter Your Name Here.." class="form-control"required>
							</div>
							
						</div>					
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="c_address" placeholder="Enter Address Here.." value="<?php echo $address?>"rows="3" class="form-control"required>
						</div>	
						<div class="row"> 
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text"name="c_city" placeholder="Enter City Name Here.." value="<?php echo $city?>"class="form-control"required>
							</div>	
								
						<div class="col-sm-4 form-group">
						<label>Email Address</label>
						<input type="email"name="c_email" placeholder="Enter Email Address Here.."value="<?php echo $email?>" class="form-control"required>
					     </div>
                	</div>				
							
                     <div class="row">

						
					<div class="col-sm-4 form-group">
						<label>Phone Number</label>
						<input type="text" name="c_contact"placeholder="Enter Phone Number Here.."value="<?php echo $contact?>" class="form-control"required>
					</div>		
					</div>
					
					
					
					<div class="row">
							<div class="col-sm-4 form-group">
								<label>Password</label>
								<input type="password"name="c_pass" placeholder="Enter Password Here.." value="<?php echo $pass?>"class="form-control"required>
							</div>		
						
						</div>
					<button type="submit" name="update" class="btn btn-lg btn-info">Update</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
	  
	 
</form>





	  
	  
	  
	  
	  
	  
	  
	  

        
		



