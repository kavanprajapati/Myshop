


 	



<?php
error_reporting(E_ALL);
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
		  			<span>-&nbsp;Total Items:<b style="color: #f93;"> <?php items();  ?></b>&nbsp;-&nbsp;Total Price: <b style="color: #f93;"><?php total_price(); ?></b>&nbsp;&nbsp; <a href="cart.php" style="text-decoration: none;"><b style="color: yellow; text-decoration: none;">Go to Cart</b></a>&nbsp;&nbsp; &nbsp; <a href="logout.php"><b style="color: red; text-decoration: none;">Logout</b></a></span>
		  		</div>
		  	</div>

           <div id="products_box">
		  
		  	 	<div align="center" style="padding: 20px;">

			<h2>Payment Options For You</h2><br>

                <?php
                  
                  $ip= getRealIpAddr();

                  $get_customer="select * from customers where customer_ip='$ip'";
                  $run_customer=mysqli_query($con,$get_customer);

                  $customer=mysqli_fetch_array($run_customer);

                  $customer_id=$customer['customer_id'];


                 ?>
			<b style="font-size: 25px;">Pay With</b>&nbsp;&nbsp;<a href="https://paypal.com"><img src="images/paypal.png" width="200" height="80"></a> <b style="font-size: 25px;">OR &nbsp;&nbsp;&nbsp;&nbsp;<a href="order.php?c_id=<?php echo $customer_id;  ?>">Pay Offline</a></b><br><br><br>

		   <b style="font-family: monospace; font-size: 15px;">If you selected "Pay Offline" option then please check your email or account to find the Invoice No for your Order.</b>

		</div>
		  	 	   	
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


<!-- <div align="center" style="padding: 20px;">

			<h2>Payment Options For You</h2><br>
			<b style="font-size: 25px;">Pay With</b>&nbsp;&nbsp;<a href="https://paypal.com"><img src="images/paypal.png" width="200" height="80"></a> <b style="font-size: 25px;">OR &nbsp;&nbsp;&nbsp;&nbsp;<a href="order.php?c_id=<?php /*echo*/ $customer_id;  ?>">Pay Offline</a></b><br><br><br>

		   <b style="font-family: monospace; font-size: 15px;">If you selected "Pay Offline" option then please check your email or account to find the Invoice No for your Order.</b>

		</div> 
 -->