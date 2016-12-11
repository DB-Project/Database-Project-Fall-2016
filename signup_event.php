<?php
	//Resumes session that was created in login
	session_start();
?>
<?php
	include("db_connection.php");
	$theQuery = "SELECT * FROM an_event";
	$theResult = mysqli_query($DB_LINK, $theQuery);
	$option = "";
	while($theRow = mysqli_fetch_array($theResult)){
		$option = $option."<option value = '$theRow[0]'> $theRow[1] $theRow[2] $theRow[3] $theRow[4] $theRow[5] $theRow[6] </option>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign up for Events!
		</title>
	</head>
	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
			<form action "" method = "POST">
				<p>Pick an event to join: </p>
				<select name="event">
					<?php echo $option; ?>
				</select>
				</br>
				<input type="submit" name="joinEvent" />
			</form>
		<?php
			
			if(isset($_POST["joinEvent"])){
				if(!empty($_POST["event"])){
					//Assign variables to user inputted values
					$eventID = stripslashes($_POST["event"]);
					$userName = $_SESSION['session_user'];
					$joinQuery = "INSERT INTO sign_up (event_id, username, rating) VALUES ('$eventID', '$userName', 0)";
					$resultJoin = mysqli_query($DB_LINK, $joinQuery);
					
					if($resultJoin){
						echo "You have succesfully signed up for the event!";
					}
				}
			}
		?>
	</body>
</html>