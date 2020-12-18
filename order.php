<?php

include("includes/db.php");
include("functions/functions.php");

//getting customer ID
if(isset($_GET['c_id'])) 
{
	$customer_id=$_GET['c_id'];
}



//getting products price and number of items


  $ip_add= getRealIpAddr();

 
  $total=0;

  $sel_price="select * from cart where ip_add='$ip_add'";
  $run_price=mysqli_query($db,$sel_price);

  $status='Pending';
  $invoice_no=mt_rand();


  $count_pro=mysqli_num_rows($run_price);


  while($record=mysqli_fetch_array($run_price))
  {
    $pro_id=$record['p_id'];

    $pro_price="select * from products where product_id='$pro_id'";
    $run_pro_price=mysqli_query($db,$pro_price);

    while($p_price=mysqli_fetch_array($run_pro_price))
    {
      $product_price=array($p_price['product_price']);

      $values=array_sum($product_price);

      $total +=$values;
    }
  }
  

  //getting quantity from cart 

  $get_cart="SELECT * from cart where ip_add='$ip_add'";
  $run_cart=mysqli_query($con,$get_cart);

  $get_qty=mysqli_fetch_array($run_cart);

  $qty=$get_qty['qty'];

  if($qty==0)
  {
  	$qty=1;

  	$sub_total=$total;
  }
  else
  {
  	$qty=$qty;

  	$sub_total=$total*$qty;
  }

  $insert_order="INSERT INTO `customer_orders`(`customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";

  $run_order=mysqli_query($con,$insert_order);

  
  	 echo "<script>alert('Order Successfully Submitted, Thank You!')</script>";
  	 echo "<script>window.open('customer/my_account.php','_self')</script>";

  	 $empty_cart="delete from cart where ip_add='$ip_add'";
  	 $run_empty=mysqli_query($con,$empty_cart);

  	 $insert_pending="INSERT INTO `pending_orders`(`customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
  	 $run_pending=mysqli_query($con,$insert_pending);
  


  


?>