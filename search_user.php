<?php
	function searchUserID($userID, $DB_LINK){
		//Searches user id
		$theQuery = stripslashes("SELECT * FROM member WHERE username = '$userID'");
		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			//Assuming the user inputted the correct user's username (userID)
			$theCount = mysqli_num_rows($theResult);
			if($theCount == 1){
				$theRow = mysqli_fetch_row($theResult);
				// echo $theRow[0];
				return $theRow;
			}
			else{
				echo "The username you searched for doesn't exist.";
			}
		}
		else{
			//ERROR CHECKING
			error_reporting(E_ALL | E_WARNING | E_NOTICE);
			ini_set('display_errors', TRUE);

			echo "SQL Error: " . mysqli_error($DB_LINK);
		}
	}
?>