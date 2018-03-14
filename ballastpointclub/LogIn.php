<!DOCTYPE html>
<!--
Name: Ballast Point Club Log In Page
Author: Davis Nguyen
Date: 2/19/2018
Description: This is the log in page for the Ballast Point Club web site. 
Users can choose whether to create a new account or log into an existing one.
-->

<?php
	require ('sql_connection.php');

	session_destroy();

	session_start();

	if(isset ($_POST['submit'])) {
		$username = ($_POST[username]);
	}

	$query = "SELECT * From User WHERE user_name = '$username'";
	$result = mysqli_query($conn, $query);

	$pass = SHA1($_POST['password']);
	
	if($result->num_rows == 0) {
	}
	else {
		$user = $result->fetch_assoc();

		if(($pass == $user['user_password']) ) {
			$_SESSION['userid'] = $user['user_id'];

			header("Location: News.php");
			exit;
		} else {
			if(isset ($_POST['submit'])) {
				$passErr = "Wrong Password";
			}
		}
	}

?>

<html>
<head>
	<title>Ballast Point Club</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">        
	<link href="css/ballastpointStyles.css" rel="stylesheet" />
</head>    
<body background="img/ballastpoint_background.png">	
	<header>
		<img src="img/ballastpoint_logo.png" alt="Logo" />
		<nav>
			<ul>
			<!--	<li><a href="News.php">News</a></li>
				<li><a href="BeerList.php">Beers</a></li>
				<li><a href="Events.php">Events</a></li>
				<li><a href="Locations.php">Visit</a></li>
				<li><a href="https://beerstore.ballastpointbrewingandspirits.com/storefront.aspx">Shop</a></li>			-->
				<li><a href="LogIn.php">Log In</a></li>			
				<li><a href="Registration.php">Register</a></li>			
			</ul>
		</nav>
	<header>

	<section id="create_account">
		<h1>Create New Account</h1>
		<br>
		<a href="Registration.php" class="button">Register</a>
	</section>
        
	<section id="log_in">
		<h1>Log In</h1>
	        <form action="#" method="post">
			<label for="username">Username</label>
                        	<input type="text" name="username" id="username">
                        	<span id="username_error"></span><br>
			
			<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<span class="error"><?php echo $passErr;?></span><br>

			<input type="submit" name="submit" id="submit" value="Log In">
		</form>

<!--<a href="#">Forgot Password?</a>-->
	</section>

	<footer>
		<a href="https://www.facebook.com/BallastPoint"><img src="img/SocialMediaIcons/icon_facebook.png" alt="Facebook"/></a>
		<a href="https://www.twitter.com/BallastPoint"><img src="img/SocialMediaIcons/icon_twitter.png" alt="Twitter"/></a>
		<a href="https://www.instagram.com/ballastpointbrewing"><img src="img/SocialMediaIcons/icon_instagram.png" alt="Instagram"/></a>
		<a href="mailto:info@ballastpoint.com"><img src="img/SocialMediaIcons/icon_email.png" alt="Email"/></a>
		<a href="https://www.ballastpoint.com/locations/"><img src="img/SocialMediaIcons/icon_locations.png" alt="Locations"/></a>
	</footer>
</body>
</html>