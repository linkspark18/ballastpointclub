<!DOCTYPE html>
<?php
	require ('sql_connection.php');

	session_start();
	$user_id = $_SESSION['userid'];
?>
<html>
	<head>
		<title>Locations Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			<div><h1>Ballast Point Locations</h1>
		</header>
			
		<section id="locations">
		<table>
			<tr>
				<td colspan=2>
					<h2>Come visit us at any of our seven locations</h2></div>
				</td>
			</tr>
			<tr>
				<td>
					<h3>Daleville, Virginia</h3>
					555 International Pkwy<br>
					Daleville, VA 24083<br>
					540-591-3059
				</td>
				<td><img src="img/Locations/Daleville_VA.png" /></td>
			
	
			<tr>
				<td>
					<h3>Long Beach</h3>
					110 Marina Dr.<br>
					Long Beach, CA 90803<br>
					562-296-4470
				</td>
				<td><img src="img/Locations/LongBeach.png" /></td>
			</tr>
	
			<tr>				
				<td>
					<h3>Miramar</h3>
					9045 Carroll Way<br>
					San Diego, CA 92121<br>
					Offices: 858-790-6900<br>
					Restaurant: 858-790-6901<br>
					miramar@ballastpoint.com
				</td>
				<td><img src="img/Locations/Miramar.png" /></td>
			</tr>
		
			<tr>
				<td>
					<h3>Scripps Ranch</h3>
					10051 Old Grove Rd<br>
					San Diego, CA 92131<br>
					858-695-2739<br>
					ScrippsRanch@ballastpoint.com
				</td>
				<td><img src="img/Locations/ScrippsRanch.png" /></td>
			</tr>
	
			<tr>
				<td>
					<h3>Little Italy</h3>
					2215 India St<br>
					San Diego, CA 92101<br>
					619-255-7213<br>
					littleitaly@ballastpoint.com
				</td>
				<td><img src="img/Locations/LittleItaly.png" /></td>
			</tr>

			<tr>
				<td>
					<h3>Home Brew Mart</h3>
					5401 Linda Vista Road<br>
					Suite 406<br>
					San Diego, CA 92110<br>
					619-295-2337
				</td>
				<td><img src="img/Locations/HomeBrewMart.png" /></td>
			</tr>

			<tr>
				<td>
					<h3>Temecula</h3>
					28551 Rancho California Rd<br>
					Temecula, CA 92590<br>
					951-676-5544<br>
					temecula@ballastpoint.com
				</td>
				<td><img src="img/Locations/Temecula.png" /></td>
			</tr>

		</table>
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