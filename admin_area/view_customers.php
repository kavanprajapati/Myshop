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
		th,tr
		{
			border: 3px groove #333;
		}
	</style>
</head>
<body>
<table width="794" align="center">
	<tr align="center">
		<td colspan="6"><h2>View All Customers</h2></td>
	</tr>

	<tr align="center">
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Image</th>
		<th>Country</th>
		<th>Action</th>
	</tr>
    <?php
  
      include("includes/db.php");

      $i=0;

      $get_c="SELECT * FROM customers";
      $run=mysqli_query($con,$get_c);

      while($row_c=mysqli_fetch_array($run))
      {
      	$i++;

        $c_id=$row_c['customer_id'];
        $c_name=$row_c['customer_name'];
        $c_email=$row_c['customer_email'];
        $c_image=$row_c['customer_image'];
        $c_country=$row_c['customer_country'];
        
       
      ?>
	<tr  align="center">
	  <td><?php echo $i;   ?></td>	
	  <td><?php echo $c_name;   ?></td>	
	  <td><?php echo $c_email;   ?></td>	
	  <td><img src="../customer/customer_photos/<?php echo $c_image; ?>" width="60" height="60"></td>	
	  <td><?php echo $c_country;   ?></td>		
	  <td><button><a href="delete_c.php?delete_c=<?php echo $c_id;  ?>">Delete</a></button></td>		
	</tr>

<?php } ?>

</table>
</body>
</html>
<?php } ?>