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
			echo "<br> The following events share the same interest as you, " . $_SESSION['session_user'];
			
			Search::searchSharedInterest($_SESSION['session_user'], $DB_LINK);
		?>
		</p>
	</body>
</html>