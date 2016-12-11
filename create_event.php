<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign Up Page
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="signup.php">Sign Up</a>
		<a href="login.php">Login</a>
		
      <h1>Create Event Here!</h1>
			<form action="" method="POST">
				<p>Title</p><input type="text" name="title">
				<p>Description:</p><TEXTAREA name="description" ROWS=3 COLS =30></TEXTAREA>
				<p>Start Time</p><input type="text" name="starttime">
				<p>End Time</p><input type="text" name="endtime">
				<p>location</p>
				<?php 
				include("db_connection.php");
				

				$locationQuery = "SELECT location_name FROM location";
				$result = mysqli_query ($DB_LINK, $locationQuery);
				echo "<select name='location'>";

    				while($r = mysqli_fetch_array($result)){
						echo "<option value=" . $r['location_name'] . ">" . $r['location_name'] . "</option>";

					}
  				echo "</select>";


  				?>
				<br />
				<br />
				<br />
				<br />
				<input type="submit" name="createEvent" />
			</form>
		<?php
			if(isset($_POST["createEvent"])){
				if(!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["starttime"])  && !empty($_POST["endtime"]) && !empty($_POST["location"])) {
					echo "working?";
					//Assign variables to user inputted values
					
					$eventTitle = $_POST["title"];
					$eventDescription = $_POST["description"];
					$eventstarttime = $_POST["starttime"];
					$eventendtime = $_POST["endtime"];
					$eventlocation = $_POST["location"];
					// $eventzipcode = $_POST["zipcode"];
					
					//Prevent SQL injections
					$eventTitle = stripslashes($eventTitle);
					$eventDescription = stripslashes($eventDescription);
					$eventstarttime = stripslashes($eventstarttime);
					$eventendtime = stripslashes($eventendtime);
					$eventlocation = stripslashes($eventlocation);
					// $eventzipcode = stripslashes($eventzipcode);
					

					// Ok so here we will take the current location we got from the form and get it's zipcode from location table and use the zipcode value and put it inside the an_event table later
					$getZipcode = "SELECT zipcode FROM location WHERE location_name = '$eventlocation'";

					// include("db_connection.php");
			
					$theQuery = "INSERT INTO an_event(title, description, starttime, endtime, location, zipcode) VALUES ('$eventTitle', '$eventDescription', '$eventstarttime', '$eventendtime', '$eventlocation', '$getZipcode')";

					$theResult = mysqli_query($DB_LINK, $theQuery);
					
					
					

					// ERROR CHECKING
					error_reporting(E_ALL | E_WARNING | E_NOTICE);
					ini_set('display_errors', TRUE);
					
					header("Location: homepage.php");
				}
			}
		?>
	</body>
</html>