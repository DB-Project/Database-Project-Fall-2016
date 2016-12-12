<?php
	//Resumes session that was created in login
	session_start();
?>
<?php 
	include("db_connection.php");

	$userID = $_SESSION['session_user'];
	
	$userEventQuery = "SELECT event_id, title FROM sign_up NATURAL JOIN an_event WHERE username = '$userID' AND end_time < NOW()";
	$resultUserEvent = mysqli_query($DB_LINK, $userEventQuery);

	$theOption = "";
	while($theRow = mysqli_fetch_array($resultUserEvent)){
		$theOption = $theOption."<option value = '$theRow[0]'> $theRow[1] </option>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Give ratings
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
		<h1>Rate an event!</h1>
			<form action="" method="POST">
				<p>Pick an event you signed up for:</p>
				<select name = "eventID">
					<?php echo $theOption; ?>
				</select>
				<p>Give a rating from 0 ~ 5</p>
				<select name = "eventRatings">
					<option value = 0> 0 </option>
					<option value = 1> 1 </option>
					<option value = 2> 2 </option>
					<option value = 3> 3 </option>
					<option value = 4> 4 </option>
					<option value = 5> 5 </option>
				</select>
				<br />
				<input type="submit" name="giveRatings"/>
			</form>
			
			<?php
				if(isset($_POST["giveRatings"])){
					if(!empty($_POST["eventID"]) && !empty($_POST["eventRatings"])){
						//Assign variables to user inputted values
						$eventID = stripslashes($_POST["eventID"]);
						$eventRatings = stripslashes($_POST["eventRatings"]);
						
						$theQuery = "UPDATE sign_up SET rating = '$eventRatings' WHERE event_id = '$eventID' AND username = '$userID'";
						
						$theResult = mysqli_query($DB_LINK, $theQuery);
						if($theResult){
							echo "Thank you for the rating!";
						}
						else{
							echo "Could not rate";
						}
					}
				}
			?>
	</body>
</html>