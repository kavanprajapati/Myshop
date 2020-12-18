<?php
@session_start();
include("includes/db.php");

?>
<div>
	

	<form action="checkout.php" method="POST">
		
		<table width="800" align="center" bgcolor="">
        
        <tr align="center">
        <td colspan="4"><h2>Login Or Register</h2><br></td>
        </tr>

        <tr>
		<td align="right"><b>Your Email:</b></td>
		<td><input type="text" name="c_email" required=""></td>
		</tr>

		<tr>
		<td align="right"><b>Your Password:</b></td>
		<td><input type="password" name="c_pass" required=""></td>
	    </tr>

        <tr align="center">
         <td colspan="4"><a href="checkout.php?forgot_pass">Forgot Your Password?</a></td>
        </tr>

	    <tr align="center">
		<td colspan="3"><input type="submit" name="c_login" value="Login"></td>
        </tr>

        </table>
	</form>
	<br><br>
	

     <h3 style="float: right; padding: 10px;">New User? <a href="customer_register.php">Register Here</a></h3>
     <?php

     /*if(isset($_GET['forgot_pass']))
     {
     	echo "
               <div align='center'>
                 <b>Enter Your email below, we'll send your password to your email</b>

                 <form method='post'>

                 <input type='text' name='c_email' placeholder='Enter Your Email' required=''>

                <input type='submit' name='forgot_pass' value='Send Me Password'>
                 </form>
               </div>

     	     ";

          if(isset($_POST['forgot_pass']))
          {

               $c_email=$_POST['c_email'];

               $query="SELECT * FROM customers 	WHERE customer_email='$c_email'";
               $run=mysqli_query($con,$query);

               $check=mysqli_num_rows($run);

               $row=mysqli_fetch_array($run);

               $c_name=$row['customer_name'];
               $c_pass=$row['customer_pass'];

               if($check==0)
               {
               	echo "<script>alert('This email does not exist in our database, Sorry')</script>";
               	exit();
               }
               else
               {

                  $from='admin@mysite.com';
                  $subject='Your Password';

                  $messege="

                            <html>
                              
                              <h3>Dear $c_name</h3>
                              <p>You requested for password on www.mysite.com</p>
                              <b>Your Password is:</b><span style='color:red;'>$c_pass</span>
                              <h3>Thank you for using our site</h3>
                            </html>
                          ";

                  mail($c_email, $subject, $message,$from)

                  echo "<script>alert('Password was sent to your email, please check your inbox!')</script>";
  	              echo "<script>window.open('checkout.php','_self')</script>";


               }

          }


     }
*/

	?>

</div>

<?php
error_reporting(E_ALL);
include("includes/db.php");

 if(isset($_POST['c_login']))
 {
 	$customer_email=$_POST['c_email'];
 	$customer_pass=$_POST['c_pass'];

 	$sel_customer="SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";
 	$run_customer=mysqli_query($con,$sel_customer);
 	$check_customer=mysqli_num_rows($run_customer);

 	$get_ip=getRealIpAddr();

 	$sel_cart="SELECT * FROM cart WHERE ip_add='$get_ip'";
 	$run_cart=mysqli_query($con,$sel_cart);
 	$check_cart=mysqli_num_rows($run_cart);

 	if($check_customer==0)
 	{
 		echo "<script>alert('password or email is wrong, try again!')</script>";
 		exit();
 	}

 	   if($check_customer==1 AND $check_cart==0)
 	   {
         $_SESSION['customer_email']=$customer_email;

 	   	echo "<script>window.open('customer/my_account.php','_self')</script>";
 	   }
 	   else
 	   {
 	   	  $_SESSION['customer_email']=$customer_email;

 	   	  header("location:payment_option.php");
  
          echo "<script>alert('You are successfuly logged in, Make your Payment!')</script>";

 	      
 	   }

 }

?>