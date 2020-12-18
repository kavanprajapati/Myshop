<?php

include("includes/db.php");


  if(isset($_GET['delete_payment']))
  {
  	$delete_id=$_GET['delete_payment'];

  	$delete_payment="DELETE FROM payments WHERE payment_id='$delete_id'";
  	$run=mysqli_query($con,$delete_payment);

  	if($run)
  	{
  		 echo "<script>alert('One Record has been deleted!');</script>";
  		 echo "<script>window.open('index.php?view_payments','_self')</script>";
  	}
  }




?>