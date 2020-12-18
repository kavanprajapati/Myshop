
<?php

include("includes/db.php");


  if(isset($_GET['delete_c']))
  {
  	$delete_id=$_GET['delete_c'];

  	$delete_c="DELETE FROM customers WHERE customer_id='$delete_id'";
  	$run=mysqli_query($con,$delete_c);

  	if($run)
  	{
  		 echo "<script>alert('Customer has been deleted!');</script>";
  		 echo "<script>window.open('index.php?view_customers','_self')</script>";
  	}
  }




?>