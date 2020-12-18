<?php
if(!isset($_SESSION['admin_email']))
{
   echo "<script>window.open('login.php','_self')</script>";
}

else
{


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
  	
  	<b>Insert New Brand:</b>
  	<input type="text" name="brand_title" required="">
  	<input type="submit" name="insert_brand" value="Insert Brand">

  </form>

<?php

include("includes/db.php");

if(isset($_POST['insert_brand']))
{
	$brand_title=$_POST['brand_title'];

	$insert_brand="INSERT INTO `brands`(`brand_title`) VALUES ('$brand_title')";
	$run=mysqli_query($con,$insert_brand);

	if($run)
	{
		echo "<script>alert('New Brand has been inserted!');</script>";
  		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}
?>

</body>
</html>
<?php } ?>