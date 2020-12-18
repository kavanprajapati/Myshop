<?php
include("includes/db.php");
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('login.php','_self')</script>";
}

else
{
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
	<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script> -->
</head>
<body bgcolor="#999999">
<form method="post"  enctype="multipart/form-data">
	<table width="794" align="center" border="1" bgcolor="#3399cc">
		<tr align="center">
			<td colspan="2"><h1>Insert New Product</h1></td>
		</tr>

		<tr>
			<td align="right"><b>Product Title</b></td>
			<td><input type="text" name="product_title" size="50" required=""></td>
		</tr>

		<tr>
			<td align="right"><b>Product Category</b></td>
			<td>
				
				<select name="product_cat" required="">
					<option>Select a Categories</option>
					 <?php
                
                $get_cats="SELECT * FROM categories";
                $run_cats=mysqli_query($con,$get_cats);

                while($row_cats=mysqli_fetch_assoc($run_cats))
                {
              
                  $cat_id=$row_cats['cat_id'];
                  $cat_title=$row_cats['cat_title'];

                
		  	      echo "<option value='$cat_id'>$cat_title</option>";	

		  	    }
		  	   
		  	   ?>
				</select>
			</td>
		</tr>

		<tr>
			<td align="right"><b>Product Brand</b></td>
			<td>
				<select name="product_brand" required="">
					<option>Select Brand</option>
				<?php
                
                $sel_brands="SELECT * FROM brands";
                $run_brands=mysqli_query($con,$sel_brands);

                while($row_brands=mysqli_fetch_array($run_brands))
                {
              
                  $brand_id=$row_brands['brand_id'];
                  $brand_title=$row_brands['brand_title'];

                
		  	      echo "<option value='$brand_id'>$brand_title</option>";	

		  	    }
		  	   
		  	   ?>
				</select>
			</td>
		</tr>

		<tr>
			<td align="right"><b>Product Image 1</b></td>
			<td><input type="file" name="product_img1" required=""></td>
		</tr>

		<tr>
			<td align="right"><b>Product Image 2</b></td>
			<td><input type="file" name="product_img2"></td>
		</tr>

		<tr>
			<td align="right"><b>Product Image 3</b></td>
			<td><input type="file" name="product_img3"></td>
		</tr>

		<tr>
			<td align="right"><b>Product Price</b></td>
			<td><input type="text" name="product_price" required=""></td>
		</tr>

		<tr>
			<td align="right"><b>Product Description</b></td>
			<td><textarea name="product_desc" cols="35" rows="10" required=""></textarea></td>
		</tr>

		<tr>
			<td align="right"><b>Product Keywords</b></td>
			<td><input type="text" name="product_keywords" size="50" required=""></td>
		</tr>

		<tr align="center">
			<td colspan="2"><input type="submit" name="insert_product" value="Insert Product"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
error_reporting(0);

  if(isset($_POST['insert_product']))
  {

    //Text Data local Variables

  	$product_title=$_POST['product_title'];
  	$product_cat=$_POST['product_cat'];
  	$product_brand=$_POST['product_brand'];
  	$product_price=$_POST['product_price'];
  	$product_desc=$_POST['product_desc'];
    $status='on';
    $product_keywords=$_POST['product_keywords'];

    //Image local Variables

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    //Image Temp. Names variables

    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];

    if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_title=='')
    {
      echo "<script>alert('Please Fill All the Fields');</script>";       
      exit();
    }	

    else
    {
    	//uploading images to its folder

    	move_uploaded_file($temp_name1,"product_images/$product_img1");
    	move_uploaded_file($temp_name2,"product_images/$product_img2");
    	move_uploaded_file($temp_name3,"product_images/$product_img3");

    	$insert_product="INSERT INTO `products`(`cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `status`,`product_keywords`) VALUES ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status','$product_keywords')";

    	$run_product=mysqli_query($con,$insert_product);

    	if($run_product)
    	{
    		echo "<script>alert('Product Inserted Successfully');</script>";
    		echo "<script>window.open('index.php?view_product','_self')</script>";
    	}
    }

  }


?>