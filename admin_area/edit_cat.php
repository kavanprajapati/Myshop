<?php

include("includes/db.php");
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('login.php','_self')</script>";
}

else
{
}

if(isset($_GET['edit_cat']))
{
	$cat_id=$_GET['edit_cat'];	

	$edit_cat="SELECT * FROM categories WHERE cat_id='$cat_id'";
	$run=mysqli_query($con,$edit_cat);

	$row_edit=mysqli_fetch_array($run);

	$cat_edit_id=$row_edit['cat_id'];

	$cat_title=$row_edit['cat_title'];

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
  	
  	<b>Edit Category:</b>
  	<input type="text" name="cat_title1" value="<?php echo $cat_title;  ?>" required="">
  	<input type="submit" name="update_cat" value="Update Category">

  </form>
</body>
</html>

<?php

  if(isset($_POST['update_cat']))
  {
  	$cat_title123=$_POST['cat_title1'];

  	$update_cat="UPDATE categories SET cat_title='$cat_title123' WHERE cat_id='$cat_edit_id'";
  	$run=mysqli_query($con,$update_cat);

     if($run)
     {
     	echo "<script>alert('Category Updated Successfully');</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
     }

  }

?>