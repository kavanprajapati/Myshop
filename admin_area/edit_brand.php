<?php

include("includes/db.php");
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('login.php','_self')</script>";
}

else
{
}

if(isset($_GET['edit_brand']))
{
	$brand_id=$_GET['edit_brand'];	

	$edit_brand="SELECT * FROM brands WHERE brand_id='$brand_id'";
	$run=mysqli_query($con,$edit_brand);

	$row_edit=mysqli_fetch_array($run);

	$brand_edit_id=$row_edit['brand_id'];

	$brand_title=$row_edit['brand_title'];

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form
		{
			margin: 15%;
		}
	</style>
</head>
<body>
  <form action="" method="post">
  	
  	<b>Edit Brand:</b>
  	<input type="text" name="brand_title1" value="<?php echo $brand_title;  ?>" required="">
  	<input type="submit" name="update_brand" value="Update Brand">

  </form>
</body>
</html>

<?php

  if(isset($_POST['update_brand']))
  {
  	$brand_title123=$_POST['brand_title1'];

  	$update_brand="UPDATE brands SET brand_title='$brand_title123' WHERE brand_id='$brand_edit_id'";
  	$run=mysqli_query($con,$update_brand);

     if($run)
     {
     	echo "<script>alert('Brand Updated Successfully');</script>";
      echo "<script>window.open('index.php?view_brands','_self')</script>";
     }

  }

?>