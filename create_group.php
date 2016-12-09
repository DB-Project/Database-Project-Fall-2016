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
		
		<h1>Create your group here</h1>
			<form action="" method="POST">
				<!-- <p>Group ID:</p><input type="text" name="groupID"> -->
				<p>Group Name:</p><input type="text" name="groupName">
				<p>Description:</p><TEXTAREA name="groupDescription" ROWS=3 COLS =30></TEXTAREA>
				<br />
				<input type="submit" name="createGroup" />
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
		
		if(isset($_POST["createGroup"])){
			if(!empty($_POST["groupName"]) && !empty($_POST["groupDescription"])){ // && !empty($_POST["groupCreator"])
				//Assign variables to user inputted values
				// $groupID = $_POST["groupID"];
				$groupName = $_POST["groupName"];
				$groupDescription = $_POST["groupDescription"];
				$groupCreator = $_SESSION['session_user'];

				//Prevent SQL injections
				// $groupID = stripslashes($groupID);
				$groupName = stripslashes($groupName);
				$groupDescription = stripslashes($groupDescription);
				$groupCreator = stripslashes($groupCreator);
				
				//Connect to the database
				include("db_connection.php");
		
				$theQuery = "INSERT INTO a_group(group_name, description, creator) VALUES ('$groupName', '$groupDescription', '$groupCreator')";
				$theResult = mysqli_query($DB_LINK, $theQuery);
				
				if($theResult){
					header("Location: homepage.php");
				}
				else{
					//ERROR CHECKING
					error_reporting(E_ALL | E_WARNING | E_NOTICE);
					ini_set('display_errors', TRUE);
				
					echo "SQL Error: " . mysqli_error($DB_LINK);
					echo "<br></br>";
					echo "Error: Could not create a group";
				}
			}
		}
		?>
	</body>
</html>