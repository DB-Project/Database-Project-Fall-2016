<?php
	// function searchGroupID($searchGroup, $DB_LINK){
// 		$theQuery = "SELECT group_id FROM a_group WHERE group_id =  '$searchGroup'";
// 		$theResult = mysqli_query($DB_LINK, $theQuery);
// 		if($theResult){
// 			echo "IT WORKED";
// 		}
// 		else{
// 			//ERROR CHECKING
// 			error_reporting(E_ALL | E_WARNING | E_NOTICE);
// 			ini_set('display_errors', TRUE);
//
// 			echo "SQL Error: " . mysqli_error($DB_LINK);
// 		}
// 	}
	
	function searchGroupName($searchGroup, $DB_LINK){
		$theQuery = "SELECT * FROM a_group WHERE group_name = '$searchGroup'";
		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			//Assuming the user inputted the correct group name
			$theCount = mysqli_num_rows($theResult);
			if($theCount == 1){
				$theRow = mysqli_fetch_row($theResult);
				// echo $theRow[1];
				return $theRow;
			}
			else{
				echo "The group you searched for doesn't exist.";
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