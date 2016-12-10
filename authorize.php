<?php
	function checkAuthorization($groupID, $userName, $DB_LINK){
		//This function will check if the user has authorization to create events

		$theQuery = "SELECT authorized FROM belongs_to WHERE group_id = '$groupID' AND username = '$userName'";
		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			//Assuming the parameters of groupID and userName is correct
			$theCount = mysqli_num_rows($theResult);
			if($theCount == 1){
				$theRow = mysqli_fetch_row($theResult);
				// echo $theRow[0];
				return $theRow;
			}
			else{
				// echo "There is no authorization";
				return 0;
			}
		}
		else{
			//ERROR CHECKING
			error_reporting(E_ALL | E_WARNING | E_NOTICE);
			ini_set('display_errors', TRUE);

			echo "SQL Error: " . mysqli_error($DB_LINK);
		}
	}

	function grantAuthorization($groupID, $userName, $DB_LINK){
		//This function will grant authorization to the user
		$theQuery = "UPDATE belongs_to SET authorized = 1 WHERE group_id = '$groupID' AND username = '$userName'";

		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			echo $userName . " is now authorized for " . $groupID;
		}
		else{
			//ERROR CHECKING
			error_reporting(E_ALL | E_WARNING | E_NOTICE);
			ini_set('display_errors', TRUE);

			echo "SQL Error: " . mysqli_error($DB_LINK);
			echo "<br></br>";
			echo "Error: Could not be authorized";
		}
	}
?>