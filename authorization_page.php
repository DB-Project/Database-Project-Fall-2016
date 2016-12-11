<?php
	//Resumes session that was created in login
	session_start();
?>
<?php 
	//Connect to the database
	include("db_connection.php");
	
	//Get all the existing group
	$groupQuery = "SELECT * FROM a_group";
	$resultGroupID = mysqli_query($DB_LINK, $groupQuery);
	$groupOption = "";
	while($theRow = mysqli_fetch_array($resultGroupID)){
		$groupOption = $groupOption."<option value = '$theRow[0]'> $theRow[1] </option>";
	}
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
				<br />
				<p>For the group: </p>
				<select name = "groupID">
					<?php echo $groupOption; ?>
				</select>

				<br />

				<input type="submit" name="authorizeMember"/>
			</form>
			
		<?php
		if(isset($_POST["authorizeMember"])){
			if(!empty($_POST["memberID"]) && !empty($_POST["groupID"])){
				// Assign variables to user inputted values
				$memberID = stripslashes($_POST["memberID"]);
				$groupID = stripslashes($_POST["groupID"]);
				
				//Include search user fucntions
				include("search_user.php");
				
				//Include search group functions
				include("search_group.php");
				
				//Search if username exists and get username
				$searchUserInfo = searchUserID($memberID, $DB_LINK);
				//Assuming that index 0 has the username column
				$resultUserID = stripslashes($searchUserInfo[0]);
				
				//Check if user is in the group first:
				$theQuery = "SELECT group_id, username FROM belongs_to WHERE group_id = '$groupID' AND username = '$resultUserID'";
				$theResult = mysqli_query($DB_LINK, $theQuery);
				$theCount = mysqli_num_rows($theResult);
				if($theCount == 1){
					//Include authorize functions
					include("authorize.php");
					echo grantAuthorization($groupID, $resultUserID, $DB_LINK);
				}
				else{
					echo "User does not belong to that group";
				}
			}
		}
		?>
	</body>
</html>