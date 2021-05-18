<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if(isset($_SESSION['id']))
		$id = $_SESSION['id'];

    if (!$user->get_session())
		header("location:login.php");

	if (isset($_GET['q']))
	{
		$user->user_logout();
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="theme-color" content="#7e9b9f">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/logo_dark.png">
	<title>Run 'n' Go - Run. Challenge. Cheer</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/feedback.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="img/logo.png" width="62px"></a>
			</div>
		</div>
	</nav>

	<div class="container">
		
		<div class="row">
			<div class="col-md-2 col-lg-3">
			</div>
			<div class="col-md-8 col-lg-6">
			<div class="card">
			<div class="card-title text-xs-center">
				<h1 style="margin-top: 10px">Run'N'Go Feedback Page</h1>
				<h4 class="card-subtitle text-muted">We are open to your suggestions</h4>
			</div>
			<form class="card-block">
				<div class="form-group">
				<label for="FirstName">First Name</label>
					<input type="firstname" class="form-control" id="FirstName" placeholder="First Name">
				</div>
				<div class="form-group">
				<label for="LastName">Last Name</label>
					<input type="lastname" class="form-control" id="LastName" placeholder="Last Name">
				</div>
				<div class="form-group">
				<label for="InputEmail">Email address</label>
					<input type="email" class="form-control" id="InputEmail" placeholder="Enter email">
				</div>
				<div class="form-group">
				<label for="Textarea">Suggestion/Bug</label>
					<textarea class="form-control" id="Textarea" rows="3" placeholder="Text"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			</div>
			<div class="col-md-2 col-lg-3">
			</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>