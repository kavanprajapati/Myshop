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
		td
		{
			padding: 7px;
		}
	</style>
</head>
<body>
<table width="794" align="center">
	<tr align="center">
		<td colspan="7"><h2 style="background-color: skyblue">View All Orders</h2></td>
	</tr>

	<tr align="center">
		<th>Order No</th>
		<th>Customer</th>
		<th>Invoice No</th>
		<th>Product ID</th>
		<th>QTY</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
    <?php
    error_reporting(E_ALL);
  
      include("includes/db.php");

      

      $get_orders="SELECT * FROM pending_orders";
      $run=mysqli_query($con,$get_orders);
     
        $i=0;

      while($row_orders=mysqli_fetch_array($run))
      {
      	$i++; 

        $order_id=$row_orders['order_id'];
        $c_id=$row_orders['customer_id'];
        $invoice=$row_orders['invoice_no'];
        $p_id=$row_orders['product_id'];
        $qty=$row_orders['qty'];
        $status=$row_orders['order_status'];
        
       
      ?>
	<tr  align="center">
	  <td><?php echo $i;   ?></td>	
	  <td>
	  	<?php

        $get_customer="SELECT * FROM customers WHERE customer_id='$c_id'";
        $run1=mysqli_query($con,$get_customer);

        $row=mysqli_fetch_array($run1);

        $customer_email=$row['customer_email'];
   
        echo $customer_email;

	  	?>
	  </td>	
	  <td bgcolor=""><?php echo $invoice;   ?></td>
	  <td><?php echo $p_id;   ?></td>	
	  <td><?php echo $qty; ?></td>	
	  <td><?php
    
         if($status=='Pending')
         {
         	echo $status='Pending';
         }

         else
         {
         	echo $status='Complete';
         }
	  
	  	?>
	  </td>		
	  <td><button><a href="delete_order.php?delete_order=<?php echo $order_id;  ?>">Delete</a></button></td>		
	</tr>

<?php } ?>

</table>
</body>
</html>
<?php }  ?>