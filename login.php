<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if ($user->get_session())
       header("location:index.php");
	
	if (isset($_REQUEST['submit'])) 
	{ 
		extract($_REQUEST);   
	    $login = $user->check_login($email, $parola);
		// Logare reusita
	    if ($login)
			header("location:index.php");
		// Logare nereusita
	    else   
	        echo '
				<div class="alert alert-danger fade in">
					<strong>Eroare!</strong> Date de logare incorecte! Încearcă din nou.
				</div>
				';
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#1f517c">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
		<title>Logare - Run 'n' Go</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<link rel="stylesheet" href="css/login.css">
	</head>

   <body>
    <center>
	<div class="logo">login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form action="" method="post" id="login-form" class="text-left">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Email</label>
						<input type="text" class="form-control" id="lg_username" name="email" placeholder="email">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="parola" placeholder="password">
					</div>
					<!--<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>-->
				</div>
				<button type="submit" name="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<!--<p>forgot your password? <a href="#">click here</a></p>-->
				<p>new user? <a href="register.php">create new account</a></p>
				<p><a href="index.php">back to main page</a></p>
			</div>
		</form>
	</center>
</div>
</html>