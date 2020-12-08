
<?php
session_start();
if(isset($_SESSION['userid'])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <!-- Font-awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <title>Sign in</title>
</head>
<body>
	<?php
		include 'toast.php';
	?>
  <!-- <h2 style="color: #fff;">Sign in to Order Now!</h2> -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="loginRegister.php" method="POST" onclick="return validation()">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-instagram"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name = "name"  id="name" placeholder="Name" autocomplete="off"/>
            <span id="validName" class="warning"></span>

            <input type="text" name="email" id="email" placeholder="Email" autocomplete="off"/>
            <span id="validEmail" class="warning"></span>

            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off"/>
            <span id="validPassword" class="warning"></span>

            <input type ="submit" name="submit" value="Sign Up" class="submit" />

		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="loginRegister.php" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-instagram"></i></a>
			</div>
			
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="email" autocomplete="off"/>
            <input type="password" placeholder="Password" name="password" autocomplete="off"/>
            <a href="#">Forgot your password?</a>
            <input type ="submit" name="submit" value="Sign In" class="submit"/>

		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello</h1>
				<p>Enter your personal details here and start ordering now!</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script src="js/login.js"></script>
</body>
</html>