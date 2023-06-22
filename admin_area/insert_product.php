<?php
include("includes/db.php");
?>
<html>
<head>

<title>inserting product</title>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
</head>
<body bgcolor="#33CCFF">
<form action="insert_product.php" method="post" enctype="multipart/form-data">
<table width="700" align="center" border="2" bgcolor="#FFFFCC">
  <tr align="center">
    <td colspan="8" ><h2 > <b >Insert new post</b></h2> </td>
  </tr>
  <tr>
    <td align="right"> <b>
  Product Title </b></td>
    <td><input name="product_title" type="text"></td>
   </tr>
   
    <tr>
    <td align="right"> <b>Product Category</b> </td>
    <td>
    <select name="product_cat">
    <option>Select</option>
    <?php
	$get_cats="select* from categories";
$run_cats=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($run_cats)){
$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];
echo"<option value='$cat_id'>$cat_title</option>";
}
	
	
	
	
?>
    
    
    
   </tr>
    <tr>
    <td align="right"><b> Product Image </b></td>
    <td><input name="product_image" type="file" required></td>
   </tr>
    <tr>
    <td align="right"><b> Product Price </b></td>
    <td><input name="product_price" type="text" required></td>
   </tr>
    <tr>
    <td align="right"> <b>Product Description </b></td>
    <td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
   </tr>
    <tr>
    <td align="right"> <b>Product Keywords </b></td>
    <td><input name="product_keywords" type="text"></td>
   </tr>
    <tr align="center">
    
    <td colspan="2"><input name="insert_post"  type="submit"
    value="Insert Product "></td>
   </tr>
 
</table>


</form>



</body>
</html>
<?php
if(isset($_POST['insert_post'])){
	
	$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
	
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];

	$product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp,"product_images/$product_image");


 $insert_product="insert into products(product_cat,product_title,product_price,product_desc,product_image,product_keywords)
	values('$product_cat','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
	$insert_pro=mysqli_query($con,$insert_product);
	if($insert_pro){
		echo"<script>alert('Inserted')</script>";
		echo "<script>window.open('insert_product.php','_self')</script>";
        }
        
}
	?>
