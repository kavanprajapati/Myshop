<?php

session_start();

include("includes/db.php");

?>	
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="login.css" media="all">
</head>
<body bgcolor="#3d4c74">
	<form method="POST" action="">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Admin Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text" name="email" class="input" placeholder="Email" required="">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="pass" class="input" data-type="password" placeholder="Password" required="">
				</div>
				<!-- <div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div> -->
				<div class="group">
					<input type="submit" name="login" class="button" value="Login">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<!-- <div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div> -->
		</div>
	</div>
</div>
</form>
</body>
</html>

<?php

   if(isset($_POST['login']))
   {

   	$user_email=$_POST['email'];
   	$user_pass=$_POST['pass'];

     $query="SELECT * FROM admin WHERE admin_email='$user_email' AND admin_pass='$user_pass'";
     $run=mysqli_query($con,$query);

     $check_admin=mysqli_num_rows($run);

     if($check_admin==1)
     	{
     		$_SESSION['admin_email']=$user_email;

     		echo "<script>window.open('index.php','_self')</script>";
     	}

     else
     {
     	echo "<script>alert('Admin Email or Password is Incorrect ,try again!');</script>";
     }	




   }
  



?>