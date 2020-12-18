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
		tr,th
		{
			border: 3px groove #000;
		}
		td
		{
           padding: 15px; 
		}

	</style>
</head>
<body>
	
<table width="794" align="center" >
	
	<tr align="center">
		<td colspan="4"><h2 style="background-color: white;">View All Brands</h2></td>
	</tr>
	<tr>
		<th>Brand ID</th>
		<th>Brand Title</th>
		<th colspan="2">Action</th>
	</tr>
	<?php
	$i=0;
   
   include("includes/db.php");

   $get_brands="SELECT * FROM brands";
   $run=mysqli_query($con,$get_brands);

   while($row_brands=mysqli_fetch_array($run))
   {

   	$brand_id=$row_brands['brand_id'];
   	$brand_title=$row_brands['brand_title'];
   
     $i++;

	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $brand_title; ?></td>
		<td><button><a href="index.php?edit_brand=<?php echo $brand_id;  ?>">Edit</a></button></td>
		<td><button><a href="delete_brand.php?delete_brand=<?php echo $brand_id;  ?>">Delete</a></button></td>
	</tr>
<?php  } ?>

</table>
</body>
</html>
<?php  } ?>