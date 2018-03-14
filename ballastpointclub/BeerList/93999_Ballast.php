<!DOCTYPE html>

<?php
	require ('../sql_connection.php');

	session_start();
	$user_id = $_SESSION['userid'];


//beer information
	$beer_id = 93999;

	$query_beerlist = "SELECT * FROM beer_list WHERE beer_id = $beer_id";
	$result_beerlist = mysqli_query($conn, $query_beerlist);


//beer ratings average
	$beer_average = "SELECT AVG(beer_rating) Average FROM beer WHERE beer_id = $beer_id";
	$ratings = mysqli_query($conn, $beer_average);
	$average_ratings = mysqli_fetch_assoc($ratings);
	
	$average = $average_ratings['Average'];

	if($average == null) {
		$displayAverage = "star_0.png";
	} else if($average >= 1 && $average <= 1.4) {
		$displayAverage = "star_1.png";
	} else if($average >= 1.5 && $average <= 2.4) {
		$displayAverage = "star_2.png";
	} else if($average >= 2.5 && $average <= 3.4) {
		$displayAverage = "star_3.png";
	} else if($average >= 3.5 && $average <= 4.4) {
		$displayAverage = "star_4.png";
	} else {
		$displayAverage = "star_5.png";
	}

//beer rating and comments posting
		
	if($_SERVER["REQUEST_METHOD"] == "POST") {
			
		$set = True;

		//validate rating
		if(empty($_POST["rating"])) {
			$rateErr = "Must rate beer";
			$set = False;
		}
	}

	if($set == True) {
		if(isset ($_POST['submit'])) {
			$sql = "INSERT INTO beer (beer_id, user_id, beer_rating, beer_comments) 
				VALUES ($beer_id, $user_id, '$_POST[rating]', '$_POST[comment]')";

			$conn->query($sql);

			header("Location: ./93999_Ballast.php");
			exit;
		}
	}


//beer reviews
	$query_reviews = "SELECT user_name, beer_rating, beer_comments 
				FROM beer INNER JOIN User USING(user_id) WHERE beer_id = $beer_id";
	$result_reviews = mysqli_query($conn, $query_reviews);	
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ballast Point Club</title>
	<link href="../css/ballastpointStyles.css" rel="stylesheet" />
</head>
	
<body background="../img/ballastpoint_background.png">
	
	<header>
		<img src="../img/ballastpoint_logo.png" alt="Logo" />
		<nav>
			<ul>
				<li><a href="../News.php">News</a></li>
				<li><a href="../BeerList.php">Beers</a></li>
				<li><a href="../Events.php">Events</a></li>
				<li><a href="../Locations.php">Visit</a></li>
				<li><a href="https://beerstore.ballastpointbrewingandspirits.com/storefront.aspx">Shop</a></li>			
				<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
				<li><a href="../LogIn.php">Log Out</a></li>					
			</ul>
		</nav>
	<header>

	<section id="beer">
		<?php           	
			echo "<table>";

			while($row = mysqli_fetch_assoc($result_beerlist)) {
				echo 	"<tr>
						<td rowspan=4>" . "<img src=" . $row['beer_img'] . " id='beer_pic'> </td>
					</tr>
					<tr>
						<td><h1>" . $row['beer_name'] . "</h1></td>
						<td rowspan=2 id='beer_ratings'><img src='../img/Ratings/" . $displayAverage . "' id='ratings_img' /></td>
					</tr>
					<tr>
						<td>" . $row['beer_type'] . "</td>
					</tr>
					<tr>
						<td colspan=3>" . $row['beer_description'] . "</td>
					</tr>";	
			}
		
			echo "</table>";
		?>	
	</section>
	<section id="ratings_comments">
		<form method="post" action="<?php echo htmlspecialchars($_SEVER["PHP_SELF"]);?>">
			<table>
				<tr>	
					<td id="user_ratings">
					<div class="ratings">
						<h3>Rate:</h3>
						<input type="radio" class="radio-star" name="rating" id="star5" value="5">
							<label for="star5" class="star"></label>

						<input type="radio" class="radio-star" name="rating" id="star4" value="4">
							<label for="star4" class="star"></label>

						<input type="radio" class="radio-star" name="rating" id="star3" value="3">
							<label for="star3" class="star"></label>

						<input type="radio" class="radio-star" name="rating" id="star2" value="2">
							<label for="star2" class="star"></label>

						<input type="radio" class="radio-star" name="rating" id="star1" value="1">
							<label for="star1" class="star"></label>
						<br><span class="error">* <?php echo $rateErr;?></span>
					</div>
					</td>
					<td id="user_comments">
						<div class="comments">
							<h3>Comment:</h3>
							<textarea name="comment" rows=10 cols=50></textarea>
						</div>
					</td>
				<tr>
					<td colspan=2>
						<input type="submit" name="submit" id="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
	</section>
	<section id="reviews">
		<h3>Reviews:</h3>
		<table>
			<?php
				while($reviews = mysqli_fetch_assoc($result_reviews)) 
				{

					$user_ratings = $reviews['beer_rating'];

					if($user_ratings <= 1.4) {
						$displayUserRatings = "star_1.png";
					} else if($user_ratings >= 1.5 && $user_ratings <= 2.4) {
						$displayUserRatings = "star_2.png";
					} else if($user_ratings >= 2.5 && $user_ratings <= 3.4) {
						$displayUserRatings = "star_3.png";
					} else if($user_ratings >= 3.5 && $user_ratings <= 4.4) {
						$displayUserRatings = "star_4.png";
					} else {
						$displayUserRatings = "star_5.png";
					}
	
					echo "<tr>
						<td id='review_user'> " 
							. $reviews['user_name'] .
						"</td>
						<td id='review_img'>
							<img src='../img/Ratings/" . $displayUserRatings . "' id='UserRatings_img' />
						</td>
						<td id='review_comments'>" 
							. $reviews['beer_comments'] . 
						"</td>
						</tr>";
				}
			?>
		</table>
	</section>
	<footer>
            <a href="https://www.facebook.com/BallastPoint"><img src="../img/SocialMediaIcons/icon_facebook.png" alt="Facebook"/></a>
            <a href="https://www.twitter.com/BallastPoint"><img src="../img/SocialMediaIcons/icon_twitter.png" alt="Twitter"/></a>
            <a href="https://www.instagram.com/ballastpointbrewing"><img src="../img/SocialMediaIcons/icon_instagram.png" alt="Instagram"/></a>
            <a href="mailto:info@ballastpoint.com"><img src="../img/SocialMediaIcons/icon_email.png" alt="Email"/></a>
            <a href="https://www.ballastpoint.com/locations/"><img src="../img/SocialMediaIcons/icon_locations.png" alt="Locations"/></a>
        </footer>
</body>
</html>