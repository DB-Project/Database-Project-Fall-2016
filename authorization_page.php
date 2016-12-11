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
		
		<h1>Authorize</h1>
			<form action="" method="POST">
				<p>Grant authorization to:</p><input type="text" name="memberID">
				<!-- <input type="text" name="groupName"> -->
				<br />

				<p>For the group: </p>
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

				<select name = "groupName">
					<?php echo $groupOption; ?>
				</select>

				<br />

				<input type="submit" name="authorizeMember"/>
			</form>
			
		<?php
		if(isset($_POST["authorizeMember"])){
			if(!empty($_POST["memberID"]) && !empty($_POST["groupName"])){
				// Assign variables to user inputted values
				$memberID = stripslashes($_POST["memberID"]);
				$groupName = stripslashes($_POST["groupName"]);
				
				//Connect to the database
 				include("db_connection.php");
				
				//Include search user fucntions
				include("search_user.php");
				
				//Include search group functions
				include("search_group.php");
				
				//Search if username exists and get username
				$searchUserInfo = searchUserID($memberID, $DB_LINK);
				//Assuming that index 0 has the username column
				$resultUserID = stripslashes($searchUserInfo[0]);
				
				//See if group exists and get group_id
				$searchGroupInfo= searchGroupName($groupName, $DB_LINK);
				//Assuming that index 0 has the group_id column
				$resultGroupID = stripslashes($searchGroupInfo[0]);
				
				
				//Check if user is in the group first:
				$theQuery = "SELECT group_id, username FROM belongs_to WHERE group_id = '$resultGroupID' AND username = '$resultUserID'";
				$theResult = mysqli_query($DB_LINK, $theQuery);
				$theCount = mysqli_num_rows($theResult);
				if($theCount == 1){
					//Include authorize functions
					include("authorize.php");
					echo grantAuthorization($resultGroupID, $resultUserID, $DB_LINK);
				}
				else{
					echo "User does not belong to that group";
				}
			}
		}
		?>
	</body>
</html>