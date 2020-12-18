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
			<a href="../index.php"><img src="../images/logo.png" style="float: left;"></a>
			<img src="../images/adv.png" style="float: right;">	
		</div>
		<!-- Header Starts -->


        <!-- Navigation Bar Starts -->
		<div id="navbar">
			<ul id="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../all_products.php">All Products</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<!-- <li><a href="../customer_register.php">Sign Up</a></li> -->
			    <li><a href="../cart.php">Shopping Cart</a></li>
				<li><a href="../contact.php">Contact Us</a></li> 
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
		  	
		  	<div id="sidebar_title">Manage Account</div>

		  	 <ul id="cats">
            
              <?php
               session_start();
               $customer_session=$_SESSION['customer_email'];

               $get_customer_pic="SELECT * FROM customers WHERE customer_email='$customer_session'";
               $run_customer=mysqli_query($con,$get_customer_pic);

               $row_customer=mysqli_fetch_array($run_customer);

               $customer_pic=$row_customer['customer_image'];

                echo "<b>"."</b>"."<b style='color:skyblue;'>". $_SESSION['customer_email']. "</b>"."<br>";

               echo "<img src='customer_photos/$customer_pic' width='100' height='100'><br><a href=''><b style='color:skyblue;'>Change Photo</b></a><br>";
               
              

              ?>
                <li><a href="my_account.php?my_orders">My Orders</a></li>
                <li><a href="my_account.php?edit_account">Edit Account</a></li>
                <li><a href="my_account.php?change_pass">Change Password</a></li>
                <li><a href="my_account.php?delete_account">Delete Account</a></li>
                <li><a href="logout.php">Logout</a></li>

		  	 </ul>

		    </div>

		  <!-- <div id="right_content">
		  	<?php cart();  ?> -->

		  	<div id="headline">
		  		<div id="headline_content">
		  			
                 <?php
                 
                 if(isset($_SESSION['customer_email']))
                 {
                 	echo "<b>Welcome:&nbsp;&nbsp;"."</b>"."<b style='color:yellow;'>". $_SESSION['customer_email']. "</b>";
                 }


              
                 ?>
                
		  			<?php
                     
                     if(!isset($_SESSION['customer_email']))
                     {

		  			   echo "<a href='../checkout.php'><b style='color: red; text-decoration: none;'>  &nbsp;&nbsp;Login&nbsp;&nbsp;</b></a>";
		  			 }
		  			 else
		  			 {
		  			 	echo "<a href='logout.php'><b style='color: red; text-decoration: none;'>  &nbsp;&nbsp; Logout &nbsp;&nbsp;</b></a>";
		  			 }
                     ?>
		  			
		  		</div>
		  	</div>

           <div id="products_box">
		  	
             <h2 style="background: #000; color: #fc9; padding: 20px; text-align: center; border-top: 2px solid white; border-bottom: 2px solid white; border-left:2px solid white; border-right:2px solid white;  width: 650px;">Manage Your Account Here</h2><br>


            <?php getDefault();  ?>

            <?php
             if(isset($_GET['my_orders']))
             {
              include("my_orders.php");
             }

             if(isset($_GET['edit_account']))
             {
              include("edit_account.php");
             }

             if(isset($_GET['change_pass']))
             {
             	include("change_pass.php");
             }

              if(isset($_GET['delete_account']))
             {
             	include("delete_account.php");
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