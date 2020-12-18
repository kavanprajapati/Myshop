<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
</head>
<body>

	<!-- Main Container Starts -->
	<div class="main_wrapper">
 	    
 	    <!-- Header Starts -->
		<div class="header_wrapper">
			<a href="index.php"><img src="images/logo.png" style="float: left;"></a>
			<img src="images/adv.png" style="float: right;">	
		</div>
		<!-- Header Starts -->


        <!-- Navigation Bar Starts -->
		<div id="navbar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="customer_register.php">Sign Up</a></li>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li><a href="contact.php">Contact Us</a></li>
			</ul>

            <div id="form">
            	<form method="get" action="results.php" enctype="multipart/form-data">
            		<input type="text" name="user_query" placeholder="Search a Product">
            		<input type="submit" name="search" value="Search">
            	</form>
            </div>

		</div>
		<!-- Navigation Bar End -->


        <!-- Content Section Starts -->
		<div class="content_wrapper">
		  <div id="left_sidebar">
		  	
		  	<div id="sidebar_title">Categories</div>

		  	 <ul id="cats">
             <?php getCats(); ?>    <!-- code in functions -->
		  	 </ul>

		  	<div id="sidebar_title">Brands</div> 
		  	 <ul id="cats">
		  	  <?php getBrands(); ?> <!-- code in functions -->
		  	 </ul>

		    </div>

		  <div id="right_content">
		  	<?php cart();  ?>
		  	<div id="headline">
		  		<div id="headline_content">
		  			
		  			<?php
                  
                  if(!isset($_SESSION['customer_email']))                
                  {
                  	echo "<b>Welcome Guest!</b> <b style='color: yellow;''>Shoping Cart</b>";
                  }
                  else
                  {
                  	echo "<b>Welcome: </b>"."<b style='color: #39c;'>" . $_SESSION['customer_email'] . "</b>"."<b style='color: yellow;'> Your Shoping Cart</b>";
                  }
 

                 ?>



		  			<span>-&nbsp;Total Items:<b style="color: #f93;"> <?php items();  ?></b>&nbsp;-&nbsp;Total Price: <b style="color: #f93;"><?php total_price(); ?></b>&nbsp;&nbsp;<a href="index.php" style="text-decoration: none;"><b style="color: yellow; text-decoration: none;">Back to Shopping</b></a>&nbsp;&nbsp;
                      
                     <?php
                     
                     if(!isset($_SESSION['customer_email']))
                     {

		  			   echo "<a href='checkout.php'><b style='color: red; text-decoration: none;'>Login</b></a>";
		  			 }
		  			 else
		  			 {
		  			 	echo "<a href='logout.php'><b style='color: red; text-decoration: none;'>Logout</b></a>";
		  			 }
                     ?>

		  			</span>
		  		</div>
		  	</div>

           <div id="products_box"><br>
		  	<form action="cart.php" method="post" enctype="multipart/form-data">
		  		<table width="740" align="center" bgcolor="#0099cc">
		  			<tr align="center">
		  				<td><b>Remove</b></td>
		  				<td><b>Product(s)</b></td>
		  				<td><b>Quantity</b></td>
		  				<td><b>Price</b></td>
		  			
		  			</tr>
                   
                  <?php

                   $ip_add= getRealIpAddr();

                      $new=null;
					  $total=0;

					  $sel_price="SELECT * from cart where ip_add='$ip_add'";
					  $run_price=mysqli_query($db,$sel_price);

					  while($record=mysqli_fetch_array($run_price))
					  {
					    $pro_id=$record['p_id'];

					    $pro_price="SELECT * from products where product_id='$pro_id'";
					    $run_pro_price=mysqli_query($con,$pro_price);

					    while($p_price=mysqli_fetch_array($run_pro_price))
					    {
					      $product_price=array($p_price['product_price']);
					      $product_title=$p_price['product_title'];
					      $product_image=$p_price['product_img1'];

					      $only_price=$p_price['product_price'];

					      $values=array_sum($product_price);

					      $total +=$values;
					   
					  
                  ?>

              
              <!-- Quantity update -->

                 <!-- <?php
                           
                          if(isset($_POST['update']))
                          {
                          	$qty=$_POST['qty'];

                          	$insert_qty="UPDATE cart set qty='$qty' where ip_add='$ip_add'";
                          	$run_qty=mysqli_query($con,$insert_qty);

                          	$total=$total*$qty; 
                          }

                        ?> 
 -->
		         	<tr>
		  				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;  ?>"></td>
		  				<td><?php echo $product_title;  ?><br><img src="admin_area/product_images/<?php echo $product_image; ?>" height="80" width="80"></td>
		  			  <!--   <td><input type="text" name="qty" value="" size="3"></td> -->
		  			  <td><input type="number" size="1" name="qty<?php echo($pro_id);?>" value="1" min="1" max="10"/></td>
                        <?php 
						  
						 if(isset($_POST['update']))
						{
						    
						 $qty=$_POST['qty'.$pro_id];
						 $ip = getRealIpAddr();
						 {
				        $quantity =$_POST['qty'.$pro_id];
				        $run_qty = mysqli_query($con,"update cart set qty='$qty' where p_id='$pro_id'");
						 
						  
						 $only_price =$only_price*$qty;
						 $new +=$only_price;
						 $total=$new;
						 
						}
						} 
						 
						 ?>﻿

		  				<td><?php echo  "Rs. ".$only_price; ?></td>
		  				
		  			</tr>
		                 <?php }  } ?>

		             <tr>
		             	<td colspan="3" align="right"><b>Sub Total(Qty * Price):</b></td>
		             	<td><b><?php echo "Rs. ".$total; ?></b></td>
		             </tr>

                     <tr></tr>

		             <tr align="center">
		             	<td colspan="2"><input type="submit" name="update" value="Update Cart"></td>
		             	<td><input type="submit" name="continue" value="Continue Shopping"></td>
		             	<td><button><a href="checkout.php" style="text-decoration: none; color: black;">Proceed Payment</a></button></td>
		             </tr>    
		  		</table>
		  	</form> 
		  	<?php

             if(isset($_POST['update']))
             {
               foreach($_POST['remove'] as $remove_id)
               {
               	 $delete_products="DELETE from cart where p_id='$remove_id'";
               	 $run_delete=mysqli_query($con,$delete_products);

               	 if($run_delete)
               	 {
               	 	echo "<script>window.open('cart.php','_self')</script>";
               	 }
               }
             } 

             if(isset($_POST['continue']))
             {
               echo "<script>window.open('index.php','_self')</script>";
             }
             

		  	?>	
		   </div>

		  </div>
	    </div>
	    <!-- Content Section End -->


        <!-- Footer Section Starts -->
		<div class="footer">
		
		<h2 style="color: #000; padding-top: 30px; text-align: center;">&copy; 2019 - By www.densetek.com </h2>

	    </div>
        <!-- Footer Section Starts -->

	</div>
	<!-- Main Container End -->
</body>
</html>