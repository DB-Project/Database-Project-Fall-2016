<?php
	function searchGroupID($searchGroup){
		include("db_connection.php");
		$theQuery = "SELECT group_id FROM a_group WHERE group_id =  '$searchGroup'";
		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			echo "IT WORKED";
			// header("Location: homepage.php");
		}
		else{
			//ERROR CHECKING
			error_reporting(E_ALL | E_WARNING | E_NOTICE);
			ini_set('display_errors', TRUE);

			echo "SQL Error: " . mysqli_error($DB_LINK);
		}
	}
	
	function searchGroupName($searchGroup){
		include("db_connection.php");
		$theQuery = "SELECT * FROM a_group WHERE group_name LIKE '$searchGroup'";
		$theResult = mysqli_query($DB_LINK, $theQuery);
		if($theResult){
			//Assuming the user inputted the correct group name
			$theCount = mysqli_num_rows($theResult);
			if($theCount >= 1){
				$theRow = mysqli_fetch_row($theResult);
				// echo $theRow[1];
				return $theRow;
			}
			else{
				echo "The group you searched for doesn't exist.";
			}
			// header("Location: homepage.php");
		}
		else{
			//ERROR CHECKING
			error_reporting(E_ALL | E_WARNING | E_NOTICE);
			ini_set('display_errors', TRUE);

			echo "SQL Error: " . mysqli_error($DB_LINK);
		}
	}
?>


<!-- <!DOCTYPE html>
<html>
	<head>
		<title>
			Search group
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>

		<h1>Search a group</h1>
			<form action="" method="POST">
				<p>Search a group by its ID and/or name</p><input type="text" name="groupInfo">
				<br />
				<select name=searchBy>
					<option value="all">All</option>
					<option value="groupID">Group ID</option>
					<option value="groupName">Group name</option>
				</select>
				<input type="submit" name="searchGroup"/>
			</form>


		<?php
		/* Constraints:
		 * Group Table structure:
		 * - group_id: int(20), NOT NULL, AUTO_INCREMENT
		 * - group_name: varchar(20), NOT NULL DEFAULT
		 * - description: text, NOT NULL
		 * - creator: varchar(20), NOT NULL DEFAULT
		 * - Group ID: Primary Key
		 * - Foreign Key Restraint: creator (MEMBER)
		 */

		// if(isset($_POST["searchGroup"])){
// 			if(!empty($_POST["groupInfo"])){
// 				// Assign variables to user inputted values
// 				$groupInfo = $_POST["groupInfo"];
// 				$searchBy = $_POST["searchBy"];
//
// 				//Prevent SQL injections
// 				$groupInfo = stripslashes($groupInfo);
// 				$searchBy = stripslashes($searchBy);
//
// 				//Connect to the database
//  				include("db_connection.php");
//
// 				//Switch statement to search by Group ID, Group Name, or Both (ALL)
// 				switch($searchBy){
// 					case "groupID":
// 						$theQuery = "SELECT * FROM a_group WHERE group_id LIKE '%$searchBy%'";
// 						break;
// 					case "groupName":
// 						$theQuery = "SELECT * FROM a_group WHERE group_name LIKE '%$searchBy%'";
// 						break;
// 					default: //ALL
// 						$theQuery = "SELECT * FROM a_group WHERE group_id LIKE '%$searchBy%' OR group_name LIKE '%$searchBy%'";
// 				}
//
// 				$theResult = mysqli_query($DB_LINK, $theQuery);
// 				if($theResult){
// 					echo "IT WORKED";
// 					// header("Location: homepage.php");
// 				}
// 				else{
// 					//ERROR CHECKING
// 					error_reporting(E_ALL | E_WARNING | E_NOTICE);
// 					ini_set('display_errors', TRUE);
//
// 					echo "SQL Error: " . mysqli_error($DB_LINK);
// 					echo "<br></br>";
// 					echo "Error: Could not create a group";
// 				}
// 			}
// 		}
		?>
	</body>
</html> -->