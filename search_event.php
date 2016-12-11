<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Events of Shared Interest
		</title>
	</head>
	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
		<?php
			include("db_connection.php");
			include("search.php");
			echo "<br> The following events share the same interest as you, " . $_SESSION['session_user'];
			
			Search::searchSharedInterest($_SESSION['session_user'], $DB_LINK);
		?>
		
	</body>
</html>