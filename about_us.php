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
<html lang="en" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/logo_dark.png">
	<title>Run 'n' Go - Run. Challenge. Cheer</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-fixed-top navbar-dark">
		<div class="container">

			<a class="navbar-brand" href="index.php"><img src="img/logo.png" width="35px"><strong>&nbsp;&nbsp;RUN 'N' GO</strong></a>
			<button class="navbar-toggler hidden-md-up float-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation"></button>
			
			<div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
				<ul class="nav navbar-nav navbar-left">
					<li class="nav-item">
						<a class="nav-link" href="search.php">Search Track</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="friends.php">Friends</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about_us.php">About Us</a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item dropdown float-md-right">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<img class="avatar" src="img/avatar.jpg"><?php echo $user->get_firstname($id); ?></a>
						<ul class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="accsett.php"><i class="fa fa-cog fa-fw"></i> Account Settings</a>
							<li class="dropdown-divider"></li>
							<a class="dropdown-item" href="?q=logout"><i class="fa fa-sign-out fa-fw"></i> Log Out</a>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	
	<div class="container">
		
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/bogdan.jpg">
						<p><strong>Bogdan Andone</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Team Leader
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/alexandru.jpg">
						<p><strong>Alexandru Balan</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Web Designer
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/tode.jpg">
						<p><strong>Alexandru Toderica</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Web Developer
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/susu.jpg">
						<p><strong>Eduard Susu</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Quality Tester
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/mara.jpg">
						<p><strong>Mara Neciu</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Quality Tester
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/vlad.jpg">
						<p><strong>Vlad-Ștefănel Stoinea</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Web Developer
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xs-12">
					<div class="card-header text-xs-center">
						<img class="avatar-us" src="img/paul.jpg">
						<p><strong>Paul Adrian Bahnareanu</strong></p>
					</div>
					<div class="card text-xs-center">
						<div class="card-block">
							Quality Tester
						</div>
					</div>
				</div>
			</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/tether.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
