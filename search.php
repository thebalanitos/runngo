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
						<a class="nav-link" href="#">Search Track</a>
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
		
		<div class="container col-md-8 col-lg-9">
			<div>
				<a class="card card-inverse card-success feedback text-xs-center" href="feedback.php">
						<div class="card-block">
							<h5 class="card-title"><strong>We need your feedback!</strong></h3>
						</div>
				</a>
			</div>
			
			<div class="input-group">
				<div class="form-group  has-feedback">
					<input type="text" class="form-control" id="inputSuccess5" placeholder="Search Track">
				</div>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		
			<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="card card-inverse">
				<a href="track1.php">
					<img class="card-img-top" src="img/traseu1.jpg">
					<div class="card-img-overlay">
						<h4 class="card-title">Vaslui Tour</h4>
						<h6 class="card-subtitle">Vaslui</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Distance</div>
								<div class="col-xs-6 text-xs-right"><strong>9.0 km</strong></div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Est. Time</div>
								<div class="col-xs-6 text-xs-right"><strong>1:19:34</strong></div>
							</div>
						</li>

					</ul>
				</a>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="card card-inverse">
					<a href="track2.php">
					<img class="card-img-top" src="img/traseu2.jpg">
					<div class="card-img-overlay">
						<h4 class="card-title">Splai Bahlui</h4>
						<h6 class="card-subtitle">Iasi</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Distance</div>
								<div class="col-xs-6 text-xs-right"><strong>5.4 km</strong></div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Est. Time</div>
								<div class="col-xs-6 text-xs-right"><strong>47:43</strong></div>
							</div>
						</li>
					</ul>
					</a>
				</div>
			</div>
			</div>

			<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="card card-inverse">
				<a href="track3.php">
					<img class="card-img-top" src="img/traseu3.jpg">
					<div class="card-img-overlay">
						<h4 class="card-title">Lacul Tineretului</h4>
						<h6 class="card-subtitle">Bucuresti</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Distance</div>
								<div class="col-xs-6 text-xs-right"><strong>2.8 km</strong></div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Est. Time</div>
								<div class="col-xs-6 text-xs-right"><strong>25:34</strong></div>
							</div>
						</li>

					</ul>
				</a>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="card card-inverse">
					<a href="track4.php">
					<img class="card-img-top" src="img/traseu4.jpg">
					<div class="card-img-overlay">
						<h4 class="card-title">Lacul Gheorgheni</h4>
						<h6 class="card-subtitle">Cluj-Napoca</h6>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Distance</div>
								<div class="col-xs-6 text-xs-right"><strong>1.0 km</strong></div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-6 text-xs-left">Est. Time</div>
								<div class="col-xs-6 text-xs-right"><strong>9:16</strong></div>
							</div>
						</li>
					</ul>
					</a>
				</div>
			</div>
			</div>
		
		</div>
		
		<div class="hidden-sm-down col-md-4 col-lg-3">
				<div class="card text-xs-center fade in" id="challenge1">
					<h5 class="card-header">
						<strong>New challenge!</strong>
						<button type="button" class="close" data-target="#challenge1" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
						</button>
					</h5>
					<div class="card-block">
						<a  href="user2.php"><img class="challenge-avatar" src="img/susu.jpg">
						<p class="challenge-text"><strong>Eduard Susu</strong></a><br />challenged you to run<br /><font size="7rem"><strong>30 km</strong></font><br /> in <strong>5 days</strong></p>
					</div>		
					<div class="card-footer text-muted">
						5 hours ago &middot; Accept in app
					</div>
				</div>
				<div class="card text-xs-center fade in" id="challenge2">
					<h5 class="card-header">
						<strong>New challenge!</strong>
						<button type="button" class="close" data-target="#challenge2" data-dismiss="alert">
							<span aria-hidden="true">&times;</span>
						</button>
					</h5>
					<div class="card-block">
						<a  href="user1.php"><img class="challenge-avatar" src="img/tode.jpg">
						<p class="challenge-text"><strong>Alexandru Toderica</strong></a><br />challenged you to finish<br /><font size="5rem"><strong>Splai Bahlui <span class="text-muted">(Iasi)</span></strong></font> <br /> in under<br /><font size="7rem"><strong>47:43</strong></font></p>
					</div>
					<img class="card-img" src="img/traseu2.jpg">			
					<div class="card-footer text-muted">
						2 days ago &middot; Accept in app
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
