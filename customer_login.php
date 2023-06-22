<?php
include("includes/db.php");
?>
<link rel="stylesheet" href="styles/responsive.css" media="all"/>
<link rel="stylesheet" href="styles/style.css" media="all"/>
<link rel="stylesheet" href="styles/bootstrap.min.css" media="all"/>

<br><br>

<form class="form-horizontal" method="post"  action="">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" name="email"class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit"name="login" class="btn btn-info">Sign in</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6 col-sm-10">
      <a href="customer_register.php" class="btn btn-info" > Register here</a></h3>
    </div>
  </div>


<?php
if(isset($_POST['login'])){
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];
	$sel_c="select* from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
	$run_c=mysqli_query($con,$sel_c);
$check_customer=mysqli_num_rows($run_c);
	if($check_customer==0){
		
		echo"<script>alert('Password or email is incorrect,plz try again!')</script>";
	      exit(); }
		$ip=getip();
		$sel_cart="select* from cart where ip_add='$ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_customer>0 AND $check_cart==0){
		$_SESSION['customer_email']=$c_email;
		echo "<script> alert('Login Successful')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
	}else {
	$_SESSION['customer_email']=$c_email;
		echo "<script> alert('Login Successful')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
	}

?>

</div>