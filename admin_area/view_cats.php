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
		<td colspan="4"><h2 style="background-color: white;">View All Categories</h2></td>
	</tr>
	<tr>
		<th>Category ID</th>
		<th>Category Title</th>
		<th colspan="2">Action</th>
	</tr>
	<?php
	$i=0;
   
   include("includes/db.php");

   $get_cats="SELECT * FROM categories";
   $run=mysqli_query($con,$get_cats);

   while($row_cats=mysqli_fetch_array($run))
   {

   	$cat_id=$row_cats['cat_id'];
   	$cat_title=$row_cats['cat_title'];
   
     $i++;

	?>
	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $cat_title; ?></td>
		<td><button><a href="index.php?edit_cat=<?php echo $cat_id;  ?>">Edit</a></button></td>
		<td><button><a href="delete_cat.php?delete_cat=<?php echo $cat_id;  ?>">Delete</a></button></td>
	</tr>
<?php  } ?>

</table>
</body>
</html>
<?php } ?>