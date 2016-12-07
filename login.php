<!DOCTYPE html>
<html>
	<head>
		<title>
			Login Page
		</title>
	</head>

	<body>
		<a href="signup.php">Sign Up</a>
		<a href="login.php">Login</a>
		
		<h1>Please login here</h1>
			<form action="" method="POST">
				<p>Username:</p><input type="text" name="user">
				<p>Password:</p><input type="password" name="pass">
				<br />
				<input type="submit" name="login" />
			</form>


		<?php
			if(isset($_POST["login"])){
				if(!empty($_POST["user"]) && !empty($_POST["pass"])){
					//Assign variables to user inputted values
					$userName = $_POST["user"];
					//TODO: HASH THE PASSWORD!!!!!!!!!
					$userPassword = $_POST["pass"];
	
					//Prevent SQL injections
					$userName = stripslashes($userName);
					$userPassword = stripslashes($userPassword);
					
					//Encrypting the password
					$userPassword = md5($userPassword);
					include("db_connection.php");
			
					$theQuery = "SELECT username, password FROM member WHERE username = '$userName' AND password = '$userPassword'";

					$theResult = mysqli_query($DB_LINK, $theQuery);
					$theCount = mysqli_num_rows($theResult);
					
					if($theCount == 1){
						// echo "It worked" . "<br>";
						
						session_start();
						$_SESSION['session_user'] = $userName;
						
						//ERROR CHECKING
						// error_reporting(E_ALL | E_WARNING | E_NOTICE);
						// ini_set('display_errors', TRUE);
						
						header("Location: homepage.php");
						exit();
					}
					else{
						echo "Incorrect username/password." . "<br>";
						//MAKE USER LOGIN AGAIN OR GO TO PUBLIC PAGE (?)
					}
				}
			}
		?>
	</body>
</html>
