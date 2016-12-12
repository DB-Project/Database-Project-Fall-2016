<?php
	class Search{
		//Prints the result of the query
		public static function printResults($theResult){
			while($theRow = mysqli_fetch_array($theResult)){
				echo '<pre>';
				print_r ($theRow);
				echo '</pre>';
			}
		}
		
		public static function printResultTable($theResult){
			print "<table>";
			print "<tr>";
			while($theRow = mysqli_fetch_field($theResult)){
				print " <th>$theRow->name </th>";
			}
			print " </tr>";
			
			while($theRow = mysqli_fetch_assoc($theResult)){
			   print " <tr>";
			   foreach ($theRow as $name=>$value){
				   print "<td>$value</td>";
			   } // end field loop
			   print " </tr>";
			  } // end record loop
		}
		
		//Search friends' events
		public static function searchFriendEvent($userID, $DB_LINK){
			$theQuery = "SELECT DISTINCT title, description, start_time, end_time, location_name, zipcode FROM sign_up NATURAL JOIN an_event WHERE username IN (SELECT friend_to FROM friend WHERE friend_of = '$userID')";
			
			$theResult = mysqli_query($DB_LINK, $theQuery);
			
			if($theResult){
				// self::printResults($theResult);
				self::printResultTable($theResult);
			}
			else{
				echo "No results";
			}
		}
		
		//Search events sponsored by group that share same intrest user
		public static function searchSharedInterest($userName, $DB_LINK){
			$theQuery = "SELECT * FROM an_event NATURAL JOIN organize WHERE group_id IN (SELECT group_id FROM about, interested_in WHERE username = '$userName' AND about.keyword = interested_in.keyword AND about.category = interested_in.category)";

			$theResult = mysqli_query($DB_LINK, $theQuery);

			if($theResult){
				self::printResultTable($theResult);
			}
			else{
				echo "No results";
			}
		}
		
		//TODO: NEED TO PUT IN TIME CONSTRATINS FRO THIS QUERY
		public static function searchAvgRatigByGroup($userName, $DB_LINK){
			$theQuery = "SELECT event_id, group_id, AVG(rating) FROM organize NATURAL JOIN sign_up WHERE group_id IN (SELECT group_id FROM belongs_to WHERE username = '$userName') GROUP BY event_id, group_id;";
			
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