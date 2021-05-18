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
		<div class="row">

			<div class="col-md-2 col-lg-2">
			</div>

			<div class="col-md-8 col-lg-8">

				<a class="card card-inverse card-success feedback text-xs-center" href="feedback.php">
					<div class="card-block">
						<h5 class="card-title"><strong>We need your feedback!</strong></h3>
					</div>
				</a>
				
				<div class="card">
					<h3 class="card-header text-xs-left">Account Settings</h3>
						
					<div class="form-horizontal">
						<div class="form-group">
							<div class="col-sm-4"></div>
							<div class="col-sm-8">
								<button class="btn btn-primary" data-toggle="modal" data-target="#modal_imagine"><i class="fa fa-picture-o"></i> Change profile picture</button>
							</div>
						</div>

						<form action="" method="post" name="photo" id="photo">
							<div class="modal fade" id="modal_imagine" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-body">
											<div class="well">The photo must have at least 300x300 pixels.</div>
											<hr />
											<div class="image-editor">
												<input type="file" class="cropit-image-input" required>
												<div class="cropit-preview"></div>
												<hr />
												<div class="controls">
													<div class="btn-group">
													<button type="button" class="btn btn-default disabled" style="cursor: default;">Rotate photo</button>
													<a class="rotate-ccw btn btn-primary"><i class="fa fa-undo"></i></a>
													<a class="rotate-cw btn btn-primary"><i class="fa fa-repeat"></i></a>
													</div>
													<hr />
													Scale photo:
													<input type="range" class="cropit-image-zoom-input" min="0" max="100">
													<input type="hidden" name="image-data" class="hidden-image-data" />
												</div>
											</div>
			
										</div>
										<div class="modal-footer">
											<button class="export btn btn-primary" type="submit" name="photo">Save</button>
											<button class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
						
					<hr />

					<form class="form-horizontal">
						<div class="form-group">
							<label for="edit-parola" class="col-sm-4 control-label">New password:</label>
							<div class="col-sm-8">			
								<input type="password" name="parola" id="edit-parola" class="form-control" maxlength="30" pattern=".{0}|.{6,30}" title="Parola trebuie să conțină minim 6 caractere." placeholder="Only if you want to change your password." autocomplete="off">
							</div>
						</div>

						<hr />

						<div class="form-group">
							<label for="edit-email" class="col-sm-4 control-label">Email:</label>
							<div class="col-sm-8">
								<input type="email" name="email" id="edit-email" class="form-control" maxlength="30" value="<?php echo $user->get_email($id); ?>" required autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label for="edit-prenume" class="col-sm-4 control-label">First name:</label>
							<div class="col-sm-8">			
								<input type="text" name="prenume" id="edit-prenume" class="form-control" maxlength="30" value="<?php echo $user->get_firstname($id); ?>" required autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label for="edit-nume" class="col-sm-4 control-label">Last name:</label>
							<div class="col-sm-8">			
								<input type="text" name="nume" id="edit-nume" class="form-control" maxlength="30" value="<?php echo $user->get_lastname($id); ?>" required autocomplete="off">
							</div>
						</div>
						
						<div class="form-group">
							<label for="edit-data" class="col-sm-4 control-label">Date of birth:</label>
							<div class="col-sm-8">			
								<div class="row">
								<div class="col-xs-4" style="padding-right: 0;">
									<select class="form-control" name="ziua" id="edit-ziua" required autocomplete="off" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
										<option value="">Day</option>';
										<?php for($i = 1; $i <= 31; $i++)
											echo '<option value="'.$i.'">'.$i.'</option>'; ?>
									echo '</select>
								</div>
								<div class="col-xs-4" style="padding-left: 0; padding-right: 0;">
									<select class="form-control" name="luna" id="edit-luna" required autocomplete="off" style="border-top-right-radius: 0; border-bottom-right-radius: 0; border-top-left-radius: 0; border-bottom-left-radius: 0;">
										<option value="">Month</option>
										<option value="1">Jan</option>
										<option value="2">Feb</option>
										<option value="3">Mar</option>
										<option value="4">Apr</option>
										<option value="5">May</option>
										<option value="6">Jun</option>
										<option value="7">Jul</option>
										<option value="8">Aug</option>
										<option value="9">Sep</option>
										<option value="10">Oct</option>
										<option value="11">Nov</option>
										<option value="12">Dec</option>
									</select>
								</div>
								<div class="col-xs-4" style="padding-left: 0;">
									<select class="form-control" name="anul" id="edit-anul" required autocomplete="off" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
										<option value="">Year</option>';
										<?php for($i = 2016; $i >= 1910; $i--)
											echo '<option value="'.$i.'">'.$i.'</option>' ?>;
									echo '</select>
								</div>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label for="edit-localitate" class="col-sm-4 control-label">City:</label>
							<div class="col-sm-8">			
								<input type="text" name="localitate" id="edit-localitate" maxlength="30" class="form-control" value="Vaslui" required autocomplete="off">
							</div>
						</div>
						
						<div class="form-group">
							<label for="edit-nume" class="col-sm-4 control-label">Height (m):</label>
							<div class="col-sm-8">			
								<input type="text" name="nume" id="edit-nume" class="form-control" maxlength="30" value="1.85" required autocomplete="off">
							</div>
						</div>

						<div class="form-group">
							<label for="edit-nume" class="col-sm-4 control-label">Weight (kg):</label>
							<div class="col-sm-8">			
								<input type="text" name="nume" id="edit-nume" class="form-control" maxlength="30" value="60" required autocomplete="off">
							</div>
						</div>

						<button class="btn btn-primary btn-block" type="submit" name="edit">Salvare modificări</button>
					
					</form>
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
