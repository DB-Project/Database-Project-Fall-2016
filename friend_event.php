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
		<style type = "text/css">
		  table, th, td {border: 1px solid black};
		 </style>
	</head>
	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
	<p>
		<?php
			include("db_connection.php");
			include("search.php");
			echo "<br> Your friends are signed up for the following events!";
			Search::searchFriendEvent($_SESSION['session_user'], $DB_LINK);
		?>
	</p>
	</body>
</html>