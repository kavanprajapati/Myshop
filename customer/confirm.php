<?php
session_start();
include("includes/db.php");

if(isset($_GET['order_id']))
{
	$order_id=$_GET['order_id'];

	$get_c="SELECT * FROM customer_orders WHERE order_id='$order_id'";
	$run_c=mysqli_query($con,$get_c);

	$row_c=mysqli_fetch_array($run_c);

	$c_id=$row_c['customer_id'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body bgcolor="#39c">
<form action="" method="post">
	<table width="500" align="center" border="2" bgcolor="#cccccc">
		<tr align="center">
			<td colspan="5"><h2>Please Confirm Your Payment</h2></td>
		</tr>

		<tr>
			<td align="right">Invoice No:</td>
			<td><input type="text" name="invoice_no" required=""></td>
		</tr>

		<tr>
			<td align="right">Amount Sent:</td>
			<td><input type="text" name="amount" required=""></td>
		</tr>

		<tr>
			<td align="right">Select Payment Mode:</td>
			<td>
				<select name="payment_method" required="">
					<option>Select Payment</option>
					<option>Bank Tranfer</option>
					<option>Western Union</option>
					<option>Paytm</option>
					<option>Paypal</option>
				</select>
			</td>
		</tr>

		<tr>
			<td align="right">Transaction/Refference ID:</td>
			<td><input type="text" name="tr" required=""></td>
		</tr>

		<tr>
			<td align="right">Paytm Code:</td>
			<td><input type="text" name="code"></td>
		</tr>

		<tr>
			<td align="right">Payment Date:</td>
			<td><input type="text" name="date" required=""></td>
		</tr>

		<tr align="center">
			<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"></td>
		</tr>

	</table>
</form>
</body>
</html>

<?php

if(isset($_POST['confirm']))
{
/*	$update_id=$_GET['update_id'];  //changesable...................
*/
	$invoice=$_POST['invoice_no'];
	$amount=$_POST['amount'];
	$payment_method=$_POST['payment_method'];
	$ref_no=$_POST['tr'];
	$code=$_POST['code'];
	$date=$_POST['date'];

	$complete='Complete';

	$payment_insert="INSERT INTO `payments`(`invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES ('$invoice','$amount','$payment_method','$ref_no','$code','$date')";
    $run_payment=mysqli_query($con,$payment_insert);

     $update_order="UPDATE customer_orders SET order_status='$complete' WHERE order_id='$order_id'";
     $run_order=mysqli_query($con,$update_order);

     $update_pending_order="UPDATE pending_orders SET order_status='$complete' WHERE customer_id='$c_id'";
     $run=mysqli_query($con,$update_pending_order);


    if($run_payment)
    {
      echo "<h2 style='text-align:center; color:white;'>Payment Recieved, your order will be completed within 24 hours</h2>";
    }

}

?>