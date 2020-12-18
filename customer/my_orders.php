<?php

include("includes/db.php");


/*getting the customers ID*/

$c=$_SESSION['customer_email'];

  $get_c="SELECT * FROM customers WHERE customer_email='$c'";
  $run_c=mysqli_query($db,$get_c);

  $row_c=mysqli_fetch_array($run_c);

  $customer_id=$row_c['customer_id'];

?>
<br>

<h3 align="center">-:All Orders Details:-</h3><br>

<table width="700px" align="center" bgcolor="#6699ff">

	<tr>
		<th>Order No.</th>
		<th>Due Amount</th>
		<th>Invoice No</th>
		<th>Total Products</th>
		<th>Order Date</th>
		<th>Paid/Unpaid</th>
		<th>Status</th>
	</tr>
	
	<?php
       
       $get_orders="SELECT * FROM customer_orders WHERE customer_id='$customer_id'";
       $run_orders=mysqli_query($con,$get_orders);

       while($ruw_orders=mysqli_fetch_array($run_orders))
       {
       	 $order_id=$ruw_orders['order_id'];
       	 $due_amount=$ruw_orders['due_amount'];
       	 $invoice_no=$ruw_orders['invoice_no'];
       	 $products=$ruw_orders['total_products'];
       	 $date=$ruw_orders['order_date'];
       	 $status=$ruw_orders['order_status'];

         $i++;

         if($status=='Pending')
         {
            $status='Unpaid';
         }
         else
         {
            $status='Paid';
         }

         echo "
               <tr align='center'>
                 <td>$i</td>    
                 <td>$due_amount</td>    
                 <td>$invoice_no</td>    
                 <td>$products</td>    
                 <td>$date</td>    
                 <td>$status</td> 
                 <td><a href='confirm.php?order_id=$order_id' target='_blank'>Confirm if Paid</a></td>   
               </tr>
              ";
       }


    
    ?>

</table>