<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Average ratings
		</title>
		<style type = "text/css">
		  table, th, td {border: 1px solid black};
		 </style>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
		<h1>Average ratings from groups you are part of</h1>
			<?php
				//Include database
				include("db_connection.php");
				include("search.php");
				
				$userName = $_SESSION['session_user'];
				
				Search::searchAvgRatigByGroup($userName, $DB_LINK);
			?>
	</body>
</html>