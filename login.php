<?php
session_start();

if(isset($_GET['username'])) {
	$_SESSION['username'] = $_GET['username'];
	header("Location: index.php");
} elseif(isset($_SESSION['username'])) {
	header("Location: index.php");
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>15 Lifts</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8" />
</head>
<body>

<div class="container">
	<h2>15 Lifts</h2>
	<form action="" method="get">
		<h3>Username</h3>
		<input type="text" name="username" class="login" placeholder="Username" /> 
		<input type="submit" value="Login" />
	</form>
	<p class="login user">
		<p><span class='note'>Note:</span> If this is your first time logging in TODAY, you may need to refresh the screen after sign in.</p>

	<?php

	if(isset($_GET['errorcode'])) {
		$errorcode = $_GET['errorcode'];

		if($errorcode == 1) {
			echo "<h2>Username cannot be blank! Try again!</h2>";
		}

	}



	?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/liftcounter.js"></script>
</body>
</html>