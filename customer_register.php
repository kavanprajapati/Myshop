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
				<li><a href="register.php">Sign Up</a></li>
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
		  			<b>Welcome Guest!</b>&nbsp;
		  			<b style="color: yellow;">Shoping Cart</b>
		  			<span>-&nbsp;Total Items:<b style="color: #f93;"> <?php items();  ?></b>&nbsp;-&nbsp;Total Price: <b style="color: #f93;"><?php total_price(); ?></b>&nbsp;&nbsp; <a href="cart.php" style="text-decoration: none;"><b style="color: yellow; text-decoration: none;">Go to Cart</b></a></a>&nbsp;&nbsp; &nbsp;
                     	
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
		  			</span></span>
		  		</div>
		  	</div>

           <div>
		  	<form action="" method="post" enctype="multipart/form-data">
	         <table width="750" align="center">
	         	<tr align="center">
	         		<td colspan="6"><h2>Create an Account</h2></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Name:</b></td>
	         		<td><input type="text" name="c_name" required=""></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Email:</b></td>
	         		<td><input type="email" name="c_email" required=""></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Password:</b></td>
	         		<td><input type="password" name="c_pass" required=""></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Country:</b></td>
	         		<td>
	         			<select name="c_country" required="">
	         			  <option>Select a Country</option>
	         			  <option>India</option>	
	         			  <option>Japan</option>	
	         			  <option>China</option>	
	         			  <option>Sri Lanka</option>	
	         			  <option>Bangladesh</option>	
	         			  <option>United Kingdom</option>	
	         			  <option>United States</option>	
	         			  <option>Pakistan</option>	
	         			  <option>Afganistan</option>	
	         			</select>
	         		</td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer City:</b></td>
	         		<td><input type="text" name="c_city" required=""></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Contact:</b></td>
	         		<td><input type="text" name="c_contact" required=""></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Address:</b></td>
	         		<td><input type="text" name="c_address" required=""></td>
	         	</tr>
	         	<tr>
	         		<td align="right"><b>Customer Image:</b></td>
	         		<td><input type="file" name="c_image" required=""></td>
	         	</tr>
	         	<tr>
	         		<td></td>
	         	</tr>
	         	<tr align="center">
	         		<td colspan="3"><input type="submit" name="register" value="Submit"></td>
	         	</tr>
	         </table> 
            </form>
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


<?php

  if(isset($_POST['register']))
  {

    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
    $c_image=$_FILES['c_image']['name'];
    $c_image_tmp=$_FILES['c_image']['tmp_name'];

    $c_ip=getRealIpAddr();

    $insert_customer="INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`,`customer_ip`) VALUES ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    $run_query=mysqli_query($con,$insert_customer);

    move_uploaded_file($c_image_tmp, "customer/customer_photos/$c_image");

    $sel_cart="SELECT * FROM cart WHERE ip_add='$c_ip'";
 	$run_cart=mysqli_query($con,$sel_cart);
 	$check_cart=mysqli_num_rows($run_cart);

 	  if($check_cart > 0)
 	  {
 	  	$_SESSION['customer_email']=$c_email;

        echo "<script>alert('Account Created Successfully, Thank You!')</script>";
 	  	echo "<script>window.open('checkout.php','_self')</script>";

 	  }
 	  else
 	  {
 	  	$_SESSION['customer_email']=$c_email;

 	  	echo "<script>alert('Account Created Successfully, Thank You!')</script>";
 	  	echo "<script>window.open('index.php','_self')</script>";
 	  }

  }

?>