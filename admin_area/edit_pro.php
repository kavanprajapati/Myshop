<?php
include("includes/db.php");

if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('login.php','_self')</script>";
}

else
{
}

if(isset($_GET['edit_pro']))
{
	$edit_id=$_GET['edit_pro'];

    $get_edit="SELECT * FROM products where product_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_edit);

    $row_edit=mysqli_fetch_array($run_edit);

    $update_id=$row_edit['product_id'];


    $p_title=$row_edit['product_title'];
    $cat_id=$row_edit['cat_id'];
    $brand_id=$row_edit['brand_id'];
    $p_image1=$row_edit['product_img1'];
    $p_image2=$row_edit['product_img2'];
    $p_image3=$row_edit['product_img3'];
    $p_price=$row_edit['product_price'];
    $p_desc=$row_edit['product_desc'];
    $p_keywords=$row_edit['product_keywords'];

}

     //getting the product relevant category

    $get_cat="SELECT * FROM categories WHERE cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $cat_row=mysqli_fetch_array($run_cat);

    $cat_edit_title=$cat_row['cat_title'];


     //getting the product relevant brand

    $get_brand="SELECT * FROM brands WHERE brand_id='$brand_id'";
    $run_brand=mysqli_query($con,$get_brand);
    $brand_row=mysqli_fetch_array($run_brand);

    $brand_edit_title=$brand_row['brand_title'];





?>


<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
	<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script> -->
</head>
<body bgcolor="#999999">
<form method="post" action="" enctype="multipart/form-data">
	<table width="794" align="center" border="1" bgcolor="#3399cc">
		<tr align="center">
			<td colspan="2"><h1>Update Product</h1></td>
		</tr>

		<tr>
			<td align="right"><b>Product Title</b></td>
			<td><input type="text" name="product_title" size="50" value="<?php echo $p_title;  ?>" required=""></td>
		</tr>

		<tr>
			<td align="right"><b>Product Category</b></td>
			<td>
				
				<select name="product_cat" required="">
					<option value="<?php echo $cat_id;  ?>"><?php echo $cat_edit_title;  ?></option>
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
					<option value="<?php echo $brand_id;  ?>"><?php echo $brand_edit_title  ?></option>
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
			<td><input type="file" name="product_img1"><br><img src="product_images/<?php echo $p_image1; ?>" width="80" height="80"></td>
		</tr>

		<tr>
			<td align="right"><b>Product Image 2</b></td>
			<td><input type="file" name="product_img2"><br><img src="product_images/<?php echo $p_image2; ?>" width="80" height="80"></td>
		</tr>

		<tr>
			<td align="right"><b>Product Image 3</b></td>
			<td><input type="file" name="product_img3"><br><img src="product_images/<?php echo $p_image3; ?>" width="80" height="80"></td>
		</tr>

		<tr>
			<td align="right"><b>Product Price</b></td>
			<td><input type="text" name="product_price" required=""  value="<?php echo $p_price;  ?>"></td>
		</tr>

		<tr>
			<td align="right"><b>Product Description</b></td>
			<td><textarea name="product_desc" cols="35" rows="10" required=""><?php echo $p_desc;  ?></textarea></td>
		</tr>

		<tr>
			<td align="right"><b>Product Keywords</b></td>
			<td><input type="text" name="product_keywords" size="50" required=""  value="<?php echo $p_keywords;  ?>"></td>
		</tr>

		<tr align="center">
			<td colspan="2"><input type="submit" name="update_product" value="Update Product"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
error_reporting(0);

if(isset($_POST['update_product']))
{

    //Text Data local Variables

  	$product_title=$_POST['product_title'];
  	$product_cat=$_POST['product_cat'];
  	$product_brand=$_POST['product_brand'];
  	$product_price=$_POST['product_price'];
  	$product_desc=$_POST['product_desc'];
    $status='on';
    $product_keywords=$_POST['product_keywords'];

    if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_title=='')
    {
      echo "<script>alert('Please Fill All the Fields');</script>";       
      exit();
    }	

 else
  {
     if(!empty($_FILES['product_img1']['name']))
     {
       $product_img1=$_FILES['product_img1']['name'];
       $temp_name1=$_FILES['product_img1']['tmp_name'];
       move_uploaded_file($temp_name1,"product_images/$product_img1");
    }
    else
    {
       $product_img1=$row_edit['product_img1'];
    }

    if(!empty($_FILES['product_img2']['name']))
    {
       $product_img2=$_FILES['product_img2']['name'];
       $temp_name2=$_FILES['product_img2']['tmp_name'];
       move_uploaded_file($temp_name2,"product_images/$product_img2");
    }
    else
    {
       $product_img2=$row_edit['product_img2'];
    }
    if(!empty($_FILES['product_img3']['name']))
    {
       $product_img3=$_FILES['product_img3']['name'];
       $temp_name3=$_FILES['product_img3']['tmp_name'];
       move_uploaded_file($temp_name3,"product_images/$product_img3");
    }
   else
   {
       $product_img3=$row_edit['product_img3'];
   }

    	$update_product="UPDATE `products` SET `cat_id`='$product_cat',`brand_id`='$product_brand',`date`=NOW(),`product_title`='$product_title',`product_img1`='$product_img1',`product_img2`='$product_img2',`product_img3`='$product_img3',`product_price`='$product_price',`product_desc`='$product_desc',`product_keywords`='$product_keywords' WHERE product_id='$update_id'";

    	$run_update=mysqli_query($con,$update_product);

    	if($run_update)
    	{
    		echo "<script>alert('Product Updated Successfully');</script>";
    		echo "<script>window.open('index.php?view_products','_self')</script>";
    	}
  }

}


?>