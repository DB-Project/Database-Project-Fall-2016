<?php 
	include("db_connection.php");
	
	$locationQuery = "SELECT * FROM location";
	$resultLocation = mysqli_query($DB_LINK, $locationQuery);
	
	$option = "";
	while($theRow = mysqli_fetch_array($resultLocation)){
		$option = $option."<option value = \"$theRow[0]@$theRow[1]\"> $theRow[0] $theRow[2] $theRow[1]</option>";
		echo $option;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign Up for Event
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
	
	<h1>Create Event Here!</h1>
		<form action "" method = "POST">
			<p>Title</p><input type="text" name="title">
			<p>Description</p><TEXTAREA name="description" ROWS=3 COLS =30></TEXTAREA>
			
<!--TODO: Put constraint on time so that start time cannot be after end time -->
			
			<p>Start Time (Format: YYYY-MM-DDTHH:MM:SSZ)</p><input type="datetime" name="startTime">
			<p>End Time (Format: YYYY-MM-DDTHH:MM:SSZ)</p><input type="datetime" name="endTime">
			<p>Location and Zip code</p>
			<select name="location">
				<?php echo $option; ?>
			</select>
			</br>
			<input type="submit" name="createEvent" />
		</form>
		<?php
			if(isset($_POST["createEvent"])){
				if(!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["startTime"])  && !empty($_POST["endTime"]) && !empty($_POST["location"])) {
					//Assign variables to user inputted values
					$eventTitle = stripslashes($_POST["title"]);
					$eventDescription = stripslashes($_POST["description"]);
					$eventStartTime = stripslashes($_POST["startTime"]);
					$eventEndTime = stripslashes($_POST["endTime"]);
					
					$eventLocationZipcode = explode('@', $_POST["location"], 2);
					
					$eventLocation = $eventLocationZipcode[0];
					$eventZipcode = $eventLocationZipcode[1];
					
					// echo $eventLocation;
					// echo "</br>";
					// echo $eventZipcode;
					
					$theQuery = "INSERT INTO an_event(title, description, start_time, end_time, location_name, zipcode) VALUES ('$eventTitle', '$eventDescription', '$eventStartTime', '$eventEndTime', '$eventLocation', '$eventZipcode')";
					
					$theResult = mysqli_query($DB_LINK, $theQuery);
					
					if($theResult){
						echo $eventTitle . " successfully created!";
					}
					else{
						//ERROR CHECKING
						error_reporting(E_ALL | E_WARNING | E_NOTICE);
						ini_set('display_errors', TRUE);

						echo "SQL Error: " . mysqli_error($DB_LINK);
						echo "</br>";
						echo "Could not create an event";
					}
				}
			}
		?>
	</body>
</html>