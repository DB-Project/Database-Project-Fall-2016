<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Friends
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
		
		<h1>Make Friends!</h1>
			<form action="" method="POST">
				<p>Friend's name:</p><input type="text" name="friendName">
				<br />
				<input type="submit" name="makeFriends"/>
			</form>


		<?php
		if(isset($_POST["makeFriends"])){
			if(!empty($_POST["friendName"])){
				// Assign variables to user inputted values
				$friendName = stripslashes($_POST["friendName"]);

				//Connect to the database
 				include("db_connection.php");
				
				//Include search class
				include("search_user.php");

				//See if user exists and get username
				$searchResult = searchUserID($friendName, $DB_LINK);

				//Assuming that index 0 has the username column
				$resultUserID = stripslashes($searchResult[0]);

				//Current session username
				$sessionUser = stripslashes($_SESSION['session_user']);

				//Note: user cannot add himself as a friend.
				//In addition, when a user adds a friend, 
				//the friend will have to add the user as their friend
				if($sessionUser != $resultUserID){
					$theQuery = "INSERT INTO friend (friend_of, friend_to) VALUES ('$sessionUser', '$resultUserID'), ('$resultUserID', '$sessionUser')";

					$theResult = mysqli_query($DB_LINK, $theQuery);
					if($theResult){
						echo "You are now friends with: " . $resultUserID;
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
				else{
					echo "You cannot add yourself as a friend!";
				}
			}
		}
		?>
	</body>
</html>