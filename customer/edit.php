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
		  	<?php
            
             if(isset($_GET['edit_account']))
             {
              include("edit_account.php");
             }
            ?>

            <?php

@session_start();

include("includes/db.php");

if(isset($_GET['edit_account']))
{
	$customer_email=$_SESSION['customer_email'];

	$get_customer="SELECT * FROM customers WHERE customer_email='$customer_email'";
	$run_customer=mysqli_query($con,$get_customer);

	$row=mysqli_fetch_array($run_customer);

	$id=$row['customer_id'];
	$name=$row['customer_name'];
	$email=$row['customer_email'];
	$pass=$row['customer_pass'];
	$country=$row['customer_country'];
	$city=$row['customer_city'];
	$contact=$row['customer_contact'];
	$address=$row['customer_address'];
	$image=$row['customer_image'];
}

?>

<form method="post">
	<table align="center" width="600">
		<tr>
			<td colspan="8" align="center"><h2>Update Your Account</h2></td>
		</tr>

		<tr>
			<td align="right">Customer Name:</td>
			<td><input type="text" name="c_name" value="<?php echo $name; ?>"></td>
		</tr>

		<tr>
			<td align="right">Customer Email:</td>
			<td><input type="text" name="c_email" value="<?php echo $email; ?>"></td>
		</tr>

		<tr>
			<td align="right">Customer Password:</td>
			<td><input type="password" name="c_pass" value="<?php echo $pass; ?>"></td>
		</tr>

		<tr>
			<td>Customer Country:</td>
			<td>
				<select name="c_country" disabled="">
					  <option value="<?php echo $country;  ?>"><?php echo $country;  ?></option>
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
			<td align="right">Customer City:</td>
			<td><input type="text" name="c_city" value="<?php echo $city; ?>"></td>
		</tr>

		<tr>
			<td align="right">Customer Phone No:</td>
			<td><input type="text" name="c_contact" value="<?php echo $contact; ?>"></td>
		</tr>

		<tr>
			<td align="right">Customer Address:</td>
			<td><input type="text" name="c_address" size="60" value="<?php echo $address; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Customer Image:</td>
			<td><input type="text" name="c_image" size="60" value="<?php echo $image; ?>"><img src="customer_photos/<?php echo $image; ?>" width="60" height="60"></td>
		</tr>

		<tr>
			<td align="center" colspan="8"><input type="submit" name="update_account" value="Update Now"></td>
		</tr>
	</table>
</form>

<?php

  if(isset($_POST['update_account']))
  {
  	$update_id=$id;

  	$c_name=$_POST['c_name'];
  	$c_email=$_POST['c_email'];
  	$c_pass=$_POST['c_pass'];
  	$c_city=$_POST['c_city'];
  	$c_contact=$_POST['c_contact'];
  	$c_address=$_POST['c_address'];
  	$c_image=$_FILES['c_image']['name'];
  	$c_image_tmp=$_FILES['c_image']['tmp_name'];
  }

  $update_c="UPDATE `customers` SET `customer_name`='$c_name',`customer_email`='$c_email',`customer_pass`='$c_pass',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address',`customer_image`='$c_image'  WHERE customer_id='$update_id'";
  $run_c=mysqli_query($con,$update_c);

  if($run_c)
  {
  	echo "<script>alert('Account Updated Successfully')</script>";
  	echo "<script>window.open('edit.php','_self')</script>";
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