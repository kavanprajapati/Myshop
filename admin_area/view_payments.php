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
		<td colspan="7"><h2 style="background-color: skyblue">View All Payments</h2></td>
	</tr>

	<tr align="center">
		<th>Payment No</th>
		<th>Invoice No</th>
		<th>Amount Paid</th>
		<th>Payment Method</th>
		<th>Reference No</th>
		<th>Code</th>
		<th>Payment Date</th>
		<!-- <th>Action</th> -->
	</tr>
    <?php
    error_reporting(E_ALL);
  
      include("includes/db.php");

      

      $get_payment="SELECT * FROM payments";
      $run=mysqli_query($con,$get_payment);
     
        $i=0;

      while($row_payments=mysqli_fetch_array($run))
      {
      	$i++; 

        $payment_id=$row_payments['payment_id'];
        $invoice=$row_payments['invoice_no'];
        $amount=$row_payments['amount'];
        $payment_mode=$row_payments['payment_mode'];
        $ref=$row_payments['ref_no'];
        $code=$row_payments['code'];
        $date=$row_payments['payment_date'];
        
       
      ?>
	<tr  align="center">
	  <td><?php echo $i;   ?></td>	
	  <td><?php echo $invoice;   ?></td>	
	  <td><?php echo $amount;   ?></td>	
	  <td><?php echo $payment_mode;   ?></td>
	  <td><?php echo $ref;   ?></td>	
	  <td><?php echo $code; ?></td>	
	  <td><?php echo $date;  ?></td>		
	  <!-- <td><button><a href="delete_payment.php?delete_payment=<?php echo $payment_id;  ?>">Delete</a></button></td> -->		
	</tr>

<?php } ?>

</table>
</body>
</html>
<?php } ?>