<?php

include("includes/db.php");


  if(isset($_GET['delete_order']))
  {
  	$delete_id=$_GET['delete_order'];

  	$delete_order="DELETE FROM pending_orders WHERE order_id='$delete_id'";
  	$run=mysqli_query($con,$delete_order);

  	if($run)
  	{
  		 echo "<script>alert('Order has been deleted!');</script>";
  		 echo "<script>window.open('index.php?view_orders','_self')</script>";
  	}
  }




?>