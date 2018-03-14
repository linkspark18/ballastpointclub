<!DOCTYPE html>
<!--
Name: Ballast Point Club News Page
Author: Maria Dougherty
Date: 3/7/2018
Description: This is the news page for the Ballast Point Club website. This is where news
relating to Ballast Point Brewery will be displayed. This page will also feature a beer
of the month. 
-->

<?php
	require ('sql_connection.php');

	session_start();
	$user_id = $_SESSION['userid'];

	$beer_month= "SELECT beer_id, beer_name, beer_img, beer_type, AVG(beer_rating) AS Average 
			FROM beer INNER JOIN beer_list USING(beer_id) 
			WHERE beer_id = beer_id 
			GROUP BY beer_id 
			ORDER BY AVG(beer_rating) DESC 
			LIMIT 1";

	$ratings = mysqli_query($conn, $beer_month);
	$month_ratings = mysqli_fetch_assoc($ratings);

	if($month_ratings['beer_id'] == null) {
		$beerName_Month = "Sculpin";
		$beerImg_Month = "https://linuxsandbox.coleman.edu/~ad_capstone/LinkSpark/ballastpointclub/img/Beers/beer_sculpin.png";
		$beerType_Month = "India Pale Ale";
	} else {

		$beerName_Month = $month_ratings['beer_name'];
		$beerImg_Month = $month_ratings['beer_img'];
		$beerType_Month = $month_ratings['beer_type'];
	}
?>

<html>
	<head>
		<title>Ballast Point News</title>
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
			<div><h1>Ballast Point News</h1></div>
		</header>

		<section id="news">
			<h2>Welcome to Ballast Point News!</h2>
			<p>Please check back often for current Ballast Point updates.</p>
			
			<h2>Ballast Point Brewery Declared Brewery of the Year</h2>
			<p>March 7, 2018  San Diego, CA</p>
			<p>Ballast Point Brewery has been voted as "best brewery of the year" for the third year
			in a row. Thank you to our loyal fans. We couldn't have done this without you!</p>
			
			<h2>Ballast Point Invents New Beer</h2>
			<p>February 6, 2018  San Diego, CA</p>
			<p>Ballast Point has invented a new flavor of beer. It is a pale-colored ale infused with
			tropical flavors such as pineapple, mango, papaya, and coconut. This new flavor will be
			available by the end of the month.</p>
		</section>
		
		<aside>
			<h3>Beer of the Month</h3>
			<?php echo "<img src=" . $beerImg_Month . " id='beer_pic'>" ?>
			<p>This month, we are featuring our <?php echo $beerName_Month ?>. It is a great <?php echo $beerType_Month ?> that you should give a shot. Try our paradise in a bottle.</p>
		</aside>
		
		<footer>
            <a href="https://www.facebook.com/BallastPoint"><img src="img/SocialMediaIcons/icon_facebook.png" alt="Facebook"/></a>
            <a href="https://www.twitter.com/BallastPoint"><img src="img/SocialMediaIcons/icon_twitter.png" alt="Twitter"/></a>
            <a href="https://www.instagram.com/ballastpointbrewing"><img src="img/SocialMediaIcons/icon_instagram.png" alt="Instagram"/></a>
            <a href="mailto:info@ballastpoint.com"><img src="img/SocialMediaIcons/icon_email.png" alt="Email"/></a>
            <a href="https://www.ballastpoint.com/locations/"><img src="img/SocialMediaIcons/icon_locations.png" alt="Locations"/></a>
        </footer>

	</body>
</html>