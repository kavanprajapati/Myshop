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


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<form method="post" enctype="multipart/form-data">
	<table align="center" width="300" style="border:1px solid;">
		<tr>
			<td colspan="8" align="center"><h2>Update Your Account</h2></td>
		</tr>
        <tr></tr>
		<tr>
			<td align="right">Name:</td>
			<td><input type="text" name="c_name" required="" value="<?php echo $name; ?>"></td>
		</tr>

		<tr>
			<td align="right">Email:</td>
			<td><input type="text" name="c_email" required="" value="<?php echo $email; ?>"></td>
		</tr>

		<tr>
			<td align="right">Password:</td>
			<td><input type="password" name="c_pass" required="" value="<?php echo $pass; ?>"></td>
		</tr>

		<tr>
			<td>Country:</td>
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
			<td align="right">City:</td>
			<td><input type="text" name="c_city" required="" value="<?php echo $city; ?>"></td>
		</tr>

		<tr>
			<td align="right">Contact:</td>
			<td><input type="text" name="c_contact" required="" value="<?php echo $contact; ?>"></td>
		</tr>

		<tr>
			<td align="right">Address:</td>
			<td><input type="text" name="c_address" required="" value="<?php echo $address; ?>"></td>
		</tr>
		
		<tr>
			<td align="right">Image:</td>
			<td><input type="file" name="c_image" size="30"><img src="customer_photos/<?php echo $image; ?>" width="30" height="30"></td>
		</tr>

		<tr>
			<td align="center" colspan="8"><input type="submit" name="update_account" value="Update Now"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>


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

  	if(!empty($_FILES['c_image']['name']))
  	{
  	$c_image=$_FILES['c_image']['name'];
  	$c_image_tmp=$_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer_photos/$c_image");
    }
    else
    {
      $c_image=$row['customer_image'];
    }
  

  $update_c="UPDATE `customers` SET `customer_name`='$c_name',`customer_email`='$c_email',`customer_pass`='$c_pass',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address',`customer_image`='$c_image' WHERE customer_id='$update_id'";
  $run_c=mysqli_query($con,$update_c);

  if($run_c)
  {
  	echo "<script>alert('Account Updated Successfully')</script>";
  	echo "<script>window.open('my_account.php','_self')</script>";
  }

}

?>
 