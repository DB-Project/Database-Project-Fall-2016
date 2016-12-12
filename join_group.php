<?php
	//Resumes session that was created in login
	session_start();
?>
<?php 
	include("db_connection.php");
	
	//Get all the existing group
	$groupQuery = "SELECT * FROM a_group";
	$resultGroupID = mysqli_query($DB_LINK, $groupQuery);
	
	$groupOption = "";
	while($theRow2 = mysqli_fetch_array($resultGroupID)){
		$groupOption = $groupOption."<option value = '$theRow2[0]'> $theRow2[1] </option>";
	}
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
				<p>Sponsored by</p>
				<select name = "groupName">
					<?php echo $groupOption; ?>
				</select>
				<input type="submit" name="joinGroup"/>
			</form>


		<?php
		if(isset($_POST["joinGroup"])){
			if(!empty($_POST["groupName"])){
				// Assign variables to user inputted values
				$groupName = stripslashes($_POST["groupName"]);

				//Connect to the database
 				include("db_connection.php");
				
				//Include search group table functions
				include("search_group.php");
				
				//Current session username
				$sessionUser = stripslashes($_SESSION['session_user']);

				//Note: By default, when someone joins a group, they are not authorized.
				//LATER FEATURE: To be authorized to create events, the creator of the group must give permission
				include("authorize.php");
				$authCheck = checkAuthorization($groupName, $sessionUser, $DB_LINK);
				
				$theQuery = "INSERT INTO belongs_to (group_id, username, authorized) VALUES ('$groupName', '$sessionUser', '$authCheck')";
				
				$theResult = mysqli_query($DB_LINK, $theQuery);
				if($theResult){
					echo "Successfully joined " . $resultGroupName;
				}
				else{
					//ERROR CHECKING
					error_reporting(E_ALL | E_WARNING | E_NOTICE);
					ini_set('display_errors', TRUE);

					echo "SQL Error: " . mysqli_error($DB_LINK);
					echo "<br></br>";
					echo "Error: Could not join a group";
				}
			}
		}
		?>
	</body>
</html>