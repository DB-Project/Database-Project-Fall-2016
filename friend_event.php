<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			My Friends' events
		</title>
	</head>
	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
		<?php
			include("db_connection.php");
			include("search.php");
			echo "<br> Your friends are signed up for the following events!";
			
			Search::searchFriendEvent($_SESSION['session_user'], $DB_LINK);
		?>
		
	</body>
</html>