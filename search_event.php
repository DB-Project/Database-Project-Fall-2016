<?php
	//Resumes session that was created in login
	session_start();
?>

<?php
	//TODO: THIS CODE HAS ERROR
	// function sharedGroupInterest($userName, $DB_LINK){
// 		$theQuery = "SELECT group_id FROM about, interested_in WHERE username = '$userName' AND about.keyword = interested_in.keyword AND about.category = interested_in.category";
// 		$theResult = mysqli_query($DB_LINK, $theQuery);
// 		if($theResult){
// 			//Assuming the user inputted the correct data
// 			$resultArray = array();
// 			while($theRow = mysqli_fetch_row($theResult)){
// 				$resultArray[] = $theRow;
// 			}
// 			return $resultArray;
// 		else{
// 			//ERROR CHECKING
// 			error_reporting(E_ALL | E_WARNING | E_NOTICE);
// 			ini_set('display_errors', TRUE);
//
// 			echo "SQL Error: " . mysqli_error($DB_LINK);
// 		}
// 	}

	function searchSharedInterest($userName, $DB_LINK){
		$theQuery = "SELECT * FROM an_event NATURAL JOIN organize WHERE group_id IN (SELECT group_id FROM about, interested_in WHERE username = '$userName' AND about.keyword = interested_in.keyword AND about.category = interested_in.category)";

		$theResult = mysqli_query($DB_LINK, $theQuery);

		while($theRow = mysqli_fetch_array($theResult)){
			echo '<pre>';
			print_r ($theRow);
			echo '</pre>';
		}
	}
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
			echo "<br> The following events share the same interest as you, " . $_SESSION['session_user'];
			//TODO: Fix format
			searchSharedInterest($_SESSION['session_user'], $DB_LINK);
		?>
		
	</body>
</html>