<!DOCTYPE html>

<?php

	require ('sql_connection.php');
	
	session_start();
	$user_id = $_SESSION['userid'];

	$query = "SELECT * FROM beer_list";
	$result = mysqli_query($conn, $query);
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ballast Point Club</title>
	<link href="css/ballastpointStyles.css" rel="stylesheet" />
</head>
	
<body background="img/ballastpoint_background.png">
	
	<header>
		<img src="img/ballastpoint_logo.png" alt="Logo" />
		<nav>
			<ul>
				<li><a href="News.php">News</a></li>
				<li><a href="BeerList.php">Beers</a></li>
				<li><a href="Events.php">Events</a></li>
				<li><a href="Locations.php">Visit</a></li>
				<li><a href="https://beerstore.ballastpointbrewingandspirits.com/storefront.aspx">Shop</a></li>
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="LogIn.php">Log Out</a></li>						
			</ul>
		</nav>
		<div><h1>Ballast Point Beer List</h1></div>
	<header>

	<section id="beer_list">
		<?php
			echo "<table id='main'>";
			while($row = mysqli_fetch_assoc($result)) {
				echo	"<tr>
						<td>
						<a href=BeerList/" . $row['beer_id'] . "_" . $row['beer_name'] . ">
						<table id='sub'>					
								<tr>
								<td> <img src =" . $row['beer_img'] . "></td>
								<td><h3>" . $row['beer_name'] . "</h3></td>
								<td><h5>" . $row['beer_type'] . "</h5></td>
							</tr>
						</table>
						</a>
						</td>
					</tr>";
			}
			echo "</table>";
		?>
		</div>
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