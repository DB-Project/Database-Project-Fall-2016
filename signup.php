<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign Up Page
		</title>
	</head>

	<body>
		<a href="index.php">Home</a>
		<a href="signup.php">Sign Up</a>
		<a href="login.php">Login</a>
		
      <h1>Please sign up here</h1>
			<form action="" method="POST">
				<p>Username:</p><input type="text" name="user">
				<p>Password:</p><input type="password" name="pass">
				<p>First name:</p><input type="text" name="firstname">
				<p>Last name:</p><input type="text" name="lastname">
				<p>Email:</p><input type="email" name="email">
				<p>Zipcode:</p><input type="text" name="zipcode">
				<br />
				<input type="submit" name="signup" />
			</form>
		<?php
			if(isset($_POST["signup"])){
				if(!empty($_POST["user"]) && !empty($_POST["pass"]) && !empty($_POST["firstname"])  && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["zipcode"])){
					//Assign variables to user inputted values
					$userName = $_POST["user"];
					$userPassword = $_POST["pass"];
					$userFirstName = $_POST["firstname"];
					$userLastName = $_POST["lastname"];
					$userEmail = $_POST["email"];
					$userZipcode = $_POST["zipcode"];
					
					//Prevent SQL injections
					$userName = stripslashes($userName);
					$userPassword = stripslashes($userPassword);
					$userFirstName = stripslashes($userFirstName);
					$userLastName = stripslashes($userLastName);
					$userEmail = stripslashes($userEmail);
					$userZipcode = stripslashes($userZipcode);
					
					//Encrypting the password
					$userPassword = md5($userPassword);
					include("db_connection.php");
			
					$theQuery = "INSERT INTO member(username, password, firstname, lastname, email, zipcode) VALUES ('$userName', '$userPassword', '$userFirstName', '$userLastName', '$userEmail',  '$userZipcode')";

					$theResult = mysqli_query($DB_LINK, $theQuery);
					// echo "It worked" . "<br>";
					
					session_start();
					$_SESSION['session_user'] = $userName;
					
					//ERROR CHECKING
					// error_reporting(E_ALL | E_WARNING | E_NOTICE);
					// ini_set('display_errors', TRUE);
					
					header("Location: homepage.php");
				}
			}
		?>
	</body>
</html>
