<?php
	class Search{
		
		public static function printResults($theResult){
			while($theRow = mysqli_fetch_array($theResult)){
				echo '<pre>';
				print_r ($theRow);
				echo '</pre>';
			}
		}
		
		public static function searchFriendEvent($userID, $DB_LINK){
			$theQuery = "SELECT DISTINCT title, description, start_time, end_time, location_name, zipcode FROM sign_up NATURAL JOIN an_event WHERE username IN (SELECT friend_to FROM friend WHERE friend_of = '$userID')";
			
			$theResult = mysqli_query($DB_LINK, $theQuery);
			
			if($theResult){
				self::printResults($theResult);
			}
			else{
				echo "No results";
			}
		}
	}
?>