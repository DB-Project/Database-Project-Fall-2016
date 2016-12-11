<?php
	//Resumes session that was created in login
	session_start();
?>

<?php
	function sharedGroupInterest($userName, $DB_LINK){
		$theQuery = "SELECT group_id FROM about, interested_in WHERE username = '$userName' AND about.keyword = interested_in.keyword AND about.category = interested_in.category";
		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			//Assuming the user inputted the correct data
			$resultArray = array();
			while($theRow = mysqli_fetch_row($theResult)){
				$resultArray[] = $theRow;
			}
			return $resultArray;
		else{
			//ERROR CHECKING
			error_reporting(E_ALL | E_WARNING | E_NOTICE);
			ini_set('display_errors', TRUE);

			echo "SQL Error: " . mysqli_error($DB_LINK);
		}
	}

	function searchSharedInterest($userName, $DB_LINK){
		$theQuery = "SELECT * FROM an_event NATURAL JOIN organize WHERE group_id IN (SELECT group_id FROM about, interested_in WHERE username = '$userName' AND about.keyword = interested_in.keyword AND about.category = interested_in.category)";

		$theResult = mysqli_query($DB_LINK, $theQuery);
		$resultArray = "";
		while($theRow = mysqli_fetch_array($resultLocation)){
			echo $theRow;
		}
		return $resultArray;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>
			Friends
		</title>
	</head>
	<body>
		<?php
			include("db_connection.php");
			echo "Hello";
			//TODO: FIX ME. IMPLEMENTATION NEEDED
			// searchSharedInterest($_SESSION['session_user'], $DB_LINK);
		?>
		
	</body>
</html>