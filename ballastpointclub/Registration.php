<!DOCTYPE html>
<!--
Name: Ballast Point Club Registration Page
Author: Maria Dougherty
Date: 2/19/2018
Description: This is the registration page for the Ballast Point Club web site. 
Users will register with us by providing their personal information.
Input validation controls will be used to ensure that bad data does not enter
our system. Once users register, their information will be stored into a 
members database.
-->
<?php
	require ('sql_connection.php');

	$username = ($_POST[username]);

	$query_username = "SELECT user_name From User";
	$result_username = mysqli_query($conn, $query_username);
	

	$months = array(
		'1' => 'January',
		'2' => 'February',
		'3' => 'March',
		'4' => 'April',
		'5' => 'May',
		'6' => 'June',
		'7' => 'July',
		'8' => 'August',
		'9' => 'September',
		'10' => 'October',
		'11' => 'November',
		'12' => 'December');
						
	$states = array(
		'Alabama' => 'AL',
		'Alaska' => 'AK',
		'Arizona' => 'AZ',
		'Arkansas' => 'AR',
		'California' => 'CA',
		'Colorado' => 'CO',
		'Connecticut' => 'CT',
		'Delaware' => 'DE',
		'Florida' => 'FL',
		'Georgia' => 'GA',
		'Hawaii' => 'HI',
		'Idaho' => 'ID',
		'Illinois' => 'IL',
		'Indiana' => 'IN',
		'Iowa' => 'IA',
		'Kansas' => 'KS',
		'Kentucky' => 'KY',
		'Louisiana' => 'LA',
		'Maine' => 'ME',
		'Maryland' => 'MD',
		'Massachusetts' => 'MA',
		'Michigan' => 'MI',
		'Minnesota' => 'MN',
		'Mississippi' => 'MS',
		'Missouri' => 'MO',
		'Montana' => 'MT',
		'Nebraska' => 'NE',
		'Nevada' => 'NV',
		'New Hampshire' => 'NH',
		'New Jersey' => 'NJ',
		'New Mexico' => 'NM',
		'New York' => 'NY',
		'North Carolina' => 'NC',
		'North Dakota' => 'ND',
		'Ohio' => 'OH',
		'Oklahoma' => 'OK',
		'Oregon' => 'OR',
		'Pennsylvania' => 'PA',
		'Rhode Island' => 'RI',
		'South Carolina' => 'SC',
		'South Dakota' => 'SD',
		'Tennessee' => 'TN',
		'Texas' => 'TX',
		'Utah' => 'UT',
		'Vermont' => 'VT',
		'Virginia' => 'VA',
		'Washington' => 'WA',
		'West Virginia' => 'WV',
		'Wisconsin' => 'WI',
		'Wyoming' => 'WY');
		

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$set = True;
	
	//validate first name
		if(empty($_POST["first"])) {
			$firstErr = "Must enter first name";
			$set = False;
		}
		else {
			$first = $_POST["first"];
		}
		
	//validate last name
		if(empty($_POST["last"])) {
			$lastErr = "Must enter last name";
			$set = False;
		}
		else {
			$last = $_POST["last"];
		}

	//validate email
		if(empty($_POST["email"])) {
			$emailErr = "Must enter email address";
			$set = False;
		}
		else {
			$email = $_POST["email"];

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email";
				$set = False;
			} else {			
				$email = $_POST["email"];
			}
		}

	//validate dob
		$year = $_POST["year"];
		$day = $_POST["day"];
		$month = $_POST["month"];

		$stampBirth = mktime(0, 0, 0, $month, $day, $year);

		// fetch the current date (minus 21 years)
		$today['day']   = date('d');
		$today['month'] = date('m');
		$today['year']  = date('Y') - 21;

		// generate todays timestamp
		$stampToday = mktime(0, 0, 0, $today['month'], $today['day'], $today['year']);

		if ($stampBirth > $stampToday) {
			$dobErr = "User is NOT 21 years old, sorry!";
			$set = False;
		} 

		//validate address
		if(empty($_POST["add1"])) {
			$addErr = "Must enter address";
			$set = False;
		}
		else {
			$add1 = $_POST["add1"];
		}
		
	//validate city
		if(empty($_POST["city"])) {
			$cityErr = "Must enter city";
			$set = False;
		}
		else {
			$city = $_POST["city"];
		}

	//validate zipcode
		if(empty($_POST["zip"])) {
			$zipErr = "Must enter zip code";
			$set = False;
		}
		else {
			$zip = $_POST["zip"];

			if(!preg_match("/^\d{5}$/", $zip)) {
				$zipErr = "Invalid zip code";
				$set = False;
			} else {
				$zip = $_POST["zip"];
			}
		}

	//validate phone
		if(empty($_POST["phone"])) {
			$phoneErr = "Must enter phone number";
			$set = False;
		}
		else {
			$phone = $_POST["phone"];

			if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
				$phoneErr = "Invalid phone number";
				$set = False;
			} else {
				$phone = $_POST["phone"];
			}
		}
		
	//validate username
		if(empty($_POST["username"])) {
			$userErr = "Must enter username";
			$set = False;
		}
		else {
			$user = $_POST["username"];

			if(strlen($user) < 6) {
				$userErr = "Must be at least 6 characters";
				$set = False;
			}
		}
		
		while($usernameSQL = mysqli_fetch_assoc($result_username)) {
			if($_POST['username'] == $usernameSQL['user_name']) {
				$userErr = "Username Taken";
				$set = False;
			}
		}

	//validate password
		if(empty($_POST["password"])) {
			$passErr = "Must enter password";
			$set = False;
		}
		else {
			$pass = $_POST["password"];
			if(strlen($pass) < 6) {
				$passErr = "Must be at least 6 characters";
				$set = False;
			}	
		}
		
	//validate retype password
		if(empty($_POST["retype"])) {
			$retypeErr = "Must re-enter password";
			$set = False;
		}
		else {
			$retype = $_POST["retype"];

			if($pass != $retype) {
				$retypeErr = "Passwords do not match";
				$set = False;
			} 
		}

	//if user checks or does not check newsletter
		if(isset($_POST["news"])) {
			$news = 1;	
		}
		else {
			$news = 0;
		}
	}
   
	if($set == TRUE) {
		if(isset ($_POST['submit'])) {
			$sql = "INSERT INTO User (user_firstName, user_lastName, user_email, user_address1, user_address2, user_city, user_state, user_zip, user_phone, user_name, user_password, user_newsletter, user_dob)
				VALUES ('$_POST[first]','$_POST[last]','$_POST[email]', '$_POST[add1]', '$_POST[add2]', '$_POST[city]', '$_POST[state]', '$_POST[zip]','$_POST[phone]', '$_POST[username]', SHA1('".$pass."'), $news, '$_POST[month]/$_POST[day]/$_POST[year]')";
		}
               
		if ($conn->query($sql) === TRUE) {
		} 
		else {
    			//echo "Error: " . $sql . "<br>" . $conn->error;
		}
      		
			mysql_close($conn);

			header("Location: Confirmation.php");
			exit;
		}
?>
<html>
    <head>
        <title>Registration Page</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="css/ballastpointStyles.css" rel="stylesheet" />
    </head>
    
    <body background="img/ballastpoint_background.png">
	<header>
		<img src="img/ballastpoint_logo.png" alt="Logo" />
		<nav>
			<ul>
				<li><a href="LogIn.php">Log In</a></li>						
			</ul>
		</nav>
		<div><h1>Join Us</h1></div>
	</header>
        
	<section id="registration">
		<p><span class="error">* required field</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<fieldset>
		<legend>Personal Information</legend>
                
			<label for="first">First Name</label> 
			<input type="text" name="first" id="first" value="<?php echo $first;?>">
				<span class="error">* <?php echo $firstErr;?></span>
                
			<label for="last">Last Name</label> 
			<input type="text" name="last" id="last" value="<?php echo $last;?>">
				<span class="error">* <?php echo $lastErr;?></span><br><br>
                
			<label for="email">E-Mail</label> 
			<input type="text" name="email" id="email" value="<?php echo $email?>">
				<span class="error">* <?php echo $emailErr;?></span><br><br>
                
			<label for="birth">Date of Birth
			<?php 
				echo '<select name="month">';
		
				foreach($months as $key => $value) 
				{
					echo "<option value=\"$key\">$value</option>\n";
				}
			
				echo '</select>';
				echo '<select name="day">';
			
				for($day = 1; $day <= 31; $day++) 
				{
					echo "<option value=\"$day\">$day</option>\n";
				}
				
				echo '</select>';
				echo '<select name="year">';
				
				for($year = 1900; $year <= date("Y"); $year++) 
				{
					echo "<option value=\"$year\" selected=date('Y')>$year</option>\n";
				}
				
				echo '</select>'; 
			?>
				<span class="error">* <?php echo $dobErr;?></span><br><br>
			</label>
		</fieldset>
            <fieldset>
                <legend>Address</legend>
                
                <label for="add1">Address Line #1</label> 
                <input type="text" name="add1" id="add1" value="<?php echo $add1;?>">
				<span class="error">* <?php echo $addErr;?></span><br><br>
                
                <label for="add2">Address Line #2</label> 
                <input type="text" name="add2" id="add2" value="<?php echo $add2;?>"><br><br>
                
                <label for="city">City</label> 
                <input type="text" name="city" id="city" value="<?php echo $city;?>">
				<span class="error">* <?php echo $cityErr;?></span>
                
                <label for="state">State 
			<?php 
				echo '<select name="state">';
				
				foreach($states as $key => $value) 
				{
					echo "<option value=\"$key\">$value</option>\n";
				}
				
				echo '</select>';
			?>
		</label>
                
                <label for="zip">Zip/Postal Code</label> 
                <input type="text" name="zip" id="zip" value="<?php echo $zip;?>">
				<span class="error">* <?php echo $zipErr;?></span><br><br>
                
                <label for="phone">Phone Number</label> 
                <input type="text" name="phone" id="phone" placeholder="555-555-5555" 
				value="<?php echo $phone;?>">
				<span class="error">* <?php echo $phoneErr;?></span><br><br>
            </fieldset>
            <fieldset>
                <legend>User Information</legend>
                
                <label for="username">Create Username</label>
                <input type="text" name="username" id="username" value="<?php echo $user;?>">
				<span class="error">* <?php echo $userErr;?></span><br><br>
                
                <label for="password">Create Password</label>
                <input type="password" name="password" id="password">
				<span class="error">* <?php echo $passErr;?></span><br><br>
                
                <label for="retype">Re-Type Password</label> 
                <input type="password" name="retype" id="retype">
				<span class="error">* <?php echo $retypeErr;?></span><br><br>
            </fieldset>
            <fieldset>
                <legend>Register</legend>
                
                <input type="checkbox" name="news">
                <label for="news">Click here to subscribe to our newsletter</label><br><br>
                
                <input type="submit" name="submit" id="submit" value="Sign Up">
            </fieldset>
        </form>
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