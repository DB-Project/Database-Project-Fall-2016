<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			My upcoming events
		</title>
		<style type = "text/css">
		  table, th, td {border: 1px solid black};
		 </style>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		<p>My upcoming events</p>
		<?php
			include("db_connection.php");
			include("search.php");
			$userName = $_SESSION["session_user"];

			$theQuery = "SELECT * FROM an_event NATURAL JOIN sign_up WHERE username = '$userName' AND start_time >= CURDATE() AND end_time <= CURDATE() + INTERVAL 3 DAY";
			
			$theResult = mysqli_query($DB_LINK, $theQuery);
			if($theResult){
				Search::printResultTable($theResult);
			}
			else{
				echo "No events coming up in three days";
			}
		?>
	</body>
</html>
