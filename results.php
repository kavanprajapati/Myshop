<?php

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
		  	<div id="headline">
		  		<div id="headline_content">
		  			<b>Welcome Guest!</b>
		  			<b style="color: yellow;">Shoping Cart</b>
		  			<span>- Items: - Price: </span>
		  		</div>
		  	</div>

           <div id="products_box">
		  	<?php

		  	if(isset($_GET['search']))
            {

              $user_keyword=$_GET['user_query'];

		  	$get_products="select * from products where product_keywords like '%$user_keyword%';";
            $run_products=mysqli_query($con,$get_products);

			       while($row_products=mysqli_fetch_array($run_products))
			       {
			       	$pro_id=$row_products['product_id'];
			       	$pro_title=$row_products['product_title'];
			       	$pro_cat=$row_products['cat_id'];
			       	$pro_brand=$row_products['brand_id'];
			       	$pro_desc=$row_products['product_desc'];
			       	$pro_price=$row_products['product_price'];
			       	$pro_image=$row_products['product_img1'];
			       

			        echo "

			              <div id='single_product'>
			                 <h3>$pro_title</h3>
			                 <img src='admin_area/product_images/$pro_image' width='180' height='180'><br>
			                 <p><b>Price: $pro_price </b></p>
			                 <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			                 <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>

			              </div>
			             ";
			       }
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