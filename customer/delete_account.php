<form method="post">
	<table align="center" width="600">
		<tr align="center">
			<td><h2>Are You sure you want to delete your account?</h2></td>
		</tr>
        <tr></tr>
		<tr>
			<td><input type="submit" name="yes" value="Yes I Want">
			<input type="submit" name="no" value="No I Dont Want"></td>
		</tr>
	</table>
</form>


<?php

include("includes/db.php");

$c= $_SESSION['customer_email'];

  if(isset($_POST['yes']))
   {
      $delete_account="DELETE FROM customers WHERE customer_email='$c'";
      $run=mysqli_query($con,$delete_account);

         if($run)
         {
         	 session_destroy();

         	 echo "<script>alert('your account has been deleted, Good Bye!')</script>";
         	 echo "<script>window.open('../index.php','_self')</script>";
         }
   }

   if(isset($_POST['no']))
   {
   	 echo "<script>window.open('my_account.php','_self')</script>";
   }




?>