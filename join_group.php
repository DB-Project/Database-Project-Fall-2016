<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Create group
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
		<h1>Join a group</h1>
			<form action="" method="POST">
				<p>Enter group name</p><input type="text" name="groupName">
				<br />
				<input type="submit" name="joinGroup"/>
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
		
		if(isset($_POST["joinGroup"])){
			if(!empty($_POST["groupName"])){
				// Assign variables to user inputted values
				$groupName = $_POST["groupName"];

				//Prevent SQL injections
				$groupName = stripslashes($groupName);

				//Connect to the database
 				include("db_connection.php");
				
				//Include search group table functions
				include("search_group.php");
				
				//See if group exists and get group_id
				$searchResult = searchGroupName($groupName);
				//Assuming that the index 0 has the group_id column
				$resultGroupID = stripslashes($searchResult[0]);
				echo $resultGroupID;
				
				//Note: By default, when someone joins a group, they are not authorized.
				//To be authorized to create events, the creator of the group must give permission
				
				// $theQuery = "INSERT INTO belongs_to (group_id, username, authorized) VALUES ";
				
				// $theResult = mysqli_query($DB_LINK, $theQuery);
				// if($theResult){
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
			}
		}
		?>
	</body>
</html>