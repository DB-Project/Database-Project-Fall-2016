<?php
	//Resumes session that was created in login
	session_start();
?>
<?php
	include("db_connection.php");
	$interestQuery = "SELECT * FROM interest";
	$theResult = mysqli_query($DB_LINK, $interestQuery);
	$option = "";
	while($theRow = mysqli_fetch_array($theResult)){
		$option = $option."<option value = \"$theRow[0]@$theRow[1]\"> $theRow[0] $theRow[1] </option>";
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>
				Homepage
			</title>
			<style type = "text/css">
			  table, th, td {border: 1px solid black};
			 </style>
		</head>
		
		<body>
			<a href="logout.php">Log Out</a>
			<h1>Welcome <?php echo $_SESSION["session_user"]; ?></h1>
			<ul>
				<li>
					<a href="user_upcoming_events.php">My Upcoming Events </a>
				</li>
				<li>
					<a href="signup_event.php">Event Sign Up </a>
				</li>
				<li>
					<a href="search_event.php">Search Events of Interest </a>
				</li>
				<li>
					<a href="create_event.php">Create Event </a>
				</li>
				<li>
					<a href="give_ratings.php">Rate Event </a>
				</li>
				<li>
					<a href="average_ratings.php">See Average Rating</a>
				</li>
				<li>
					<a href="friend_event.php">See Friend's Events </a>
				</li>
				<br>Extra Features</br>
				<li>
					<a href="create_group.php">Create Group</a>
				</li>
				<li>
					<a href="join_group.php">Join Group</a>
				</li>
				<li>
					<a href="make_friends.php">Make Friends</a>
				</li>
				<li>
					<a href="authorization_page.php">Authorize</a>
				</li>
			</ul>
			<p>Select an interest!</p>
					<form action "" method = "POST">
						<p>Category</p>
						<select name = "interest">
							<?php echo $option; ?>
						</select>
						</br>
						<input type="submit" name="searchInterest" />
					</form>
					<div>
				<?php
				include("search.php");
				if(isset($_POST["searchInterest"])){
					if(!empty($_POST["interest"])){
						//Assign variables to user inputted values
						$interestCatKey = explode('@', $_POST["interest"], 2);
					
						$interestCategory = $interestCatKey[0];
						$interestKeyword = $interestCatKey[1];
		
						$groupInterestQuery = "SELECT group_id FROM about WHERE category = '$interestCategory' AND keyword = '$interestKeyword'";
					
						$resultGroupInterest = mysqli_query($DB_LINK, $groupInterestQuery);
						if($resultGroupInterest){
							Search::printResultTable($resultGroupInterest);
						}
						else{
							echo "None";
						}
					}
				}
			?>
		</body>
	</html>
