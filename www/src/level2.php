<?php 
if (isset($_GET['source'])) {
    die(highlight_file(__FILE__));
}
require("conf/level2.conf.php"); 
error_reporting(0);

if (isset($_POST['username']) && isset($_POST['password'])) {

	// $query = "SELECT flag FROM my_secret_table"; We leave commented code in production because we're cool.
 
	$query = "SELECT username FROM users where username = '" . $_POST['username'] . "' and password = ?";

	// We use prepared statements, it must be secure.
	$query = $conn->prepare($query); 

	// If query is invalid
	if ($query === false) {
		$error = true;
		$error_msg = "<strong>Error!</strong> Invalid SQL query";	
	} else {

	// Bind password param
	$query->bind_param("s", $_POST['password']);
	$query->execute();
	$query->bind_result($user);
	$query->fetch();

		// Check if a valid user has been found
		if ($user != NULL) {
			session_start();
			$_SESSION['is_logged_in'] = true;
			$_SESSION['username'] = $user;
		} else {
			$error = true;
			$error_msg = "<strong>Wrong!</strong> Username/Password is invalid.";
		}
	}

}
?>
<!DOCTYPE HTML>
<html>
	<head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		.corb-body { background-color: #333;}

		.centered {
		  position: fixed;
		  top: 50%;
		  left: 50%;
		  /* bring your own prefixes */
		  transform: translate(-50%, -50%);
		}
		
		.corb-login-length { width: 500px;}
		.corb-submit { position: relative; left: auto; right: -420px;}
		.corb-flag { color: #0F0; }
		.corb-alert { margin-top: 20px; }
	</style>
	</head>
	<body class="corb-body container-fluid">
		<?php if ($_SESSION['is_logged_in'] !== true) { ?>
			<?php if (isset($error) && $error === true) { ?>
			<div class="container-fluid corb-alert">
				<div class="alert alert-danger">
					<?php echo $error_msg; ?>
				</div>
			</div>
			<?php } ?>

		<div class="row">
			<div class="centered">
				<div class="well">
					<h3 class="corb-login-length">Login If You Can</h3>
					<br/>
					<form method="POST">
					<input name="username" class="form-control" type="text" placeholder="username">
					<br/>
					<input name="password" class="form-control" type="text" placeholder="password">
					<br/>
					<input name="submit" class="corb-submit btn btn-primary btn-lg" type="submit" value="Login">
					</form>
				</div>
			</div>
		</div>
		<?php }else { ?>
			<div class="centered">
				<h1 class="corb-flag">Welcome <?php echo $_SESSION['username']; ?>! Here's some green text for you.</h1>		
				<h1 class="corb-flag"><?php echo $flag; ?></h1>		
			</div>
		<?php } ?>

		<script
		      src="https://code.jquery.com/jquery-3.1.1.min.js"
		      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		      crossorigin="anonymous"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

	</body>
</html>

<?php
session_destroy();
?>
