<!DOCTYPE html>
<!--
Name: Ballast Point Club Events Page
Author: Maria Dougherty
Date: 3/7/2018
Description: This is the events page for the Ballast Point Club website. This is where events
relating to Ballast Point Brewery will be displayed. 
-->

<?php
	require ('sql_connection.php');

	session_start();
	$user_id = $_SESSION['userid'];
?>

<html>
	<head>
		<title>Events</title>
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
		<div><h1>Ballast Point Events</h1></div>
        </header>

	<section id="events">	
		<div id="calendar">
			<div class="month">
				<ul>
					<li>March<br><span style="font-size:18px">2018</span></li>
				</ul>
			</div>
			<ul class="weekdays">
				<li>Sunday</li>
				<li>Monday</li>
				<li>Tuesday</li>
				<li>Wednesday</li>
				<li>Thursday</li>
				<li>Friday</li>
				<li>Saturday</li>
			</ul>
			<ul class="days">
				<li>25</li>
				<li>26</li>
				<li>27</li>
				<li>28</li>
				<li>1 <p>Food Truck kicks off</p></li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5 <p>Voting for Best Brewpub starts</p></li>
				<li>6</li>
				<li>7</li>
				<li>8</li>
				<li>9</li>
				<li>10</li>
				<li>11</li>
				<li>12</li>
				<li>13</li>
				<li>14 <p>Sunset Beer Dinner</p></li>
				<li>15</li>
				<li>16 <p>Spring Beer Dinner</p></li>
				<li>17 <p>Yoga & Beer</p></li>
				<li>18 <p>Barking Brigade</p></li>
				<li>19</li>
				<li>20 <p>Voting for Best Brewpub ends</p></li>
				<li>21</li>
				<li>22</li>
				<li>23</li>
				<li>24</li>
				<li>25 <p>Brushes and Beer</p></li>
				<li>26</li>
				<li>27</li>
				<li>28</li>
				<li>29 <p>Brewing Process Beer Dinner</p></li>
				<li>30</li>
				<li>31 <p>Food Truck ends</p></li>
			</ul>
		</div>

		<h2>Home Brew Mart Food Truck Schedule</h2>
			<h4>Thursday, March 1, 2018 - Saturday, March 31, 2018</h4>
			<p>Please stop by our various food truck locations throughout San Diego to taste our good snacks.</p>
			
		<h2>Best Brewpub Vote!</h2>
			<h4>Monday, March 5, 2018 - Tuesday, March 20, 2018</h4>
			<p>Ballast Point Little Italy</p>
			<p>Please vote for us. You can cast one vote per day by clicking on this page:
			<a href="https://www.ballastpoint.com/events/best-brewpub-vote/">Vote</a>. Voting ends on March 19th.</p>
			
		<h2>Sunset Beer Dinner</h2>
			<h4>Wednesday, March 14, 2018</h4>
			<p>6:30pm at Ballast Point Long Beach</p>
			<p>Come join us for a monthly beer dinner inside our brewery. Our dinner includes a
			5-course meal with beer pairings.</p>
			<p>Cost is $55 per person. Seating is limited so don't hesitate to reserve your spot.
			We look forward to seeing you!</p>
			
		<h2>Spring Beer Dinner</h2>
			<h4>Friday, March 16, 2018</h4>
			<p>7pm at Ballast Point Miramar</p>
			<p>Come join us for our Spring Beer Dinner. We will be offering a 6-course meal
			complete with beer pairings that will remind you of spring.</p>
			<p>Cost is $75 per person. Space is limited, so please don't hesitate to reserve your spot.
			We hope to see you there!</p>
			
		<h2>Yoga & Beer</h2>
			<h4>Saturday, March 17, 2018</h4>
			<p>9:30am - 10:30am at Ballast Point Long Beach</p>
			<p>Come to our Long Beach location for a 60-minute yoga session, followed by 
			a pint of your choice!</p>
			<p>Cost is $12 per person</p>
			
		<h2>Barking Brigade</h2>
			<h4>Sunday, March 18, 2018</h4>
			<p>11:30am at Ballast Point Scripps Ranch</p>
			<p>Come bring your dog for a walk from our Scripps Ranch location to Newtopia Cyder and back.
			Beer, pizza, and treats will be provided.</p>
			<p>Cost is $10</p>
			
		<h2>Brushes and Beer at Temecula</h2>
			<h4>Sunday, March 25, 2018</h4>
			<p>3pm at Ballast Point Temecula</p>
			<p>Join us in Temecula for a painting session, complete with a tasting menu and a paired 
			taster flight of beer.</p>
			<p>Cost is $55. Seating is limited, so don't hesitate to reserve your spot!</p>
			
		<h2>Brewing Process Beer Dinner</h2>
			<h4>Thursday, March 29, 2018</h4>
			<p>7pm at Ballast Point Little Italy</p>
			<p>Come join us in Little Italy for a 5-course dinner with beer pairings.</p>
			<p>Cost is $55 per person. Don't forget to reserve your spot today!</p>
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