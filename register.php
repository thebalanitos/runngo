<?php
	session_start();
    include_once 'include/class.user.php';
    $user = new User();
   
	if ($user->get_session())
       header("location:index.php");
   
    if (isset($_REQUEST['submit']))
	{
        extract($_REQUEST);
		if(strlen($parola) < 6)
			echo '
				<div class="alert alert-danger fade in">
					<strong>Eroare!</strong> Parola trebuie să fie formată din minim 6 caractere!
				</div>
				';
		else
		{
			$register = $user->reg_user($email, $parola, $prenume, $nume);
			// Inregistrare reusita
			if ($register)
			{
				$_SESSION['register_success'] = true;
				$login = $user->check_login($email, $parola);
				header("location:index.php");
			}
			// Email deja existent
			else
				echo '
					<div class="alert alert-danger fade in">
						<strong>Eroare!</strong> Un cont cu aceeași adresă de email există deja!
					</div>
					';
		}
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
		<title>Înregistrare - Run 'n' Go</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<link rel="stylesheet" href="css/login.css">
    </head>
    <body>
		<center>
			<div class="logo">register</div>
			<div class="login-form-1">
				<form action="" method="post" id="register-form" class="text-left">
					<div class="login-form-main-message"></div>
					<div class="main-login-form">
						<div class="login-group">
							<div class="form-group">
								<label for="lg_firstname" class="sr-only">First Name</label>
								<input type="text" class="form-control" id="lg_firstname" name="prenume" placeholder="first name" required>
							</div>
							<div class="form-group">
								<label for="lg_lastname" class="sr-only">Last Name</label>
								<input type="text" class="form-control" id="lg_lastname" name="nume" placeholder="last name" required>
							</div>
							<div class="form-group">
								<label for="lg_username" class="sr-only">Email</label>
								<input type="email" class="form-control" id="lg_username" name="email" placeholder="email" required>
							</div>
							<div class="form-group">
								<label for="lg_password" class="sr-only">Password</label>
								<input type="password" class="form-control" id="lg_password" name="parola" placeholder="password" required>
							</div>
						</div>
						<button type="submit" name="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
					</div>
					<div class="etc-login-form">
						<p>already registered? <a href="login.php">login here</a></p>
						<p><a href="index.php">back to main page</a></p>
					</div>
				</form>
			</div>
		</center>
    </body>
</html>
