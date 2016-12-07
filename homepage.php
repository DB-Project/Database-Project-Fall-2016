<!DOCTYPE html>
	<html>
		<head>
			<title>
				Homepage
			</title>
		</head>
		
		<body>
			<?php
<<<<<<< HEAD
				echo "This is the homepage!";
=======
				include("db_connection.php");
				
				//Assign variables to user inputted values
				$userName = $_POST["user"];
				//TODO: HASH THE PASSWORD!!!!!!!!!
				$userPassword = $_POST["pass"];
				
				//Prevent SQL injections
				$userName = stripslashes($userName);
				$userPassword = stripslashes($userPassword);
				
				$theQuery = "SELECT username, password FROM member WHERE username = '$userName' AND password = '$userPassword'";

				$theResult = mysqli_query($DB_LINK, $theQuery);
				$theCount = mysqli_num_rows($theResult);
				
				if($theCount == 1){
					echo "It worked" . "<br>";
					//SHOW THE HOME PAGE
				}
				else{
					echo "Incorrect username/password." . "<br>";
					//MAKE USER LOGIN AGAIN OR GO TO PUBLIC PAGE (?)
				}
>>>>>>> a5b1a7fffb9eca20f91bb12309107710ca1493cc
			?>
		</body>
	</html>