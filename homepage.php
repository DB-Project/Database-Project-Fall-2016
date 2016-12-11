<?php
	//Resumes session that was created in login
	session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>
				Homepage
			</title>
		</head>
		
		<body>
			<a href="logout.php">Log Out</a>
			
			<ul>
				<li>
					<a href="">My Upcoming Events </a>
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
					<a href="">See Average Rating</a>
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
			
			<?php
				echo "<br> Welcome: " . $_SESSION['session_user'] . "</br>";
			?>
		</body>
	</html>
