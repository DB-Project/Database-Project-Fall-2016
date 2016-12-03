<!DOCTYPE html>
	<html>
		<head>
			<title>
				Homepage
			</title>
		</head>
		
		<body>
			<?php
				//MySQL Database username, password, URL or IP Address, Database name
				$DB_USERNAME = "root";
				$DB_PASSWORD = "root";
				$HOSTNAME = "localhost"; //"127.0.0.1"
				$DB_TITLE = "Find_Folks";
				$PORT = 3306;
				$SOCKET = "localhost:/Applications/MAMP/tmp/mysql/mysql.sock";
				
				$DB_LINK = mysqli_init();
				$DB_CONNECTION = mysqli_real_connect(
					$DB_LINK,
					$HOSTNAME, 
					$DB_USERNAME, 
					$DB_PASSWORD, 
					$DB_TITLE,
					$PORT,
					$SOCKET
				);
				
				//Selects the default database for database queries
				//$DB_SELECT = mysqli_select_db($DB_LINK, $DB_TITLE);
				
				
				//Error checking: If connection to MySQL DB was succesful or not
				if(!DB_LINK){
					echo "Error: Unable to connect to MySQL." . PHP_EOL . "<br>";
					echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "<br>";
					echo "Debugging error: " . mysqli_connect_error() . PHP_EOL . "<br>";
					exit;
				}
				if (!mysqli_real_connect($DB_LINK, $HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_TITLE)){
				    die('Connect Error (' . mysqli_connect_errno() . ') '
				            . mysqli_connect_error());
				}
				
				//TODO: TEST CASES
				echo "Success: A proper connection to MySQL was made!" . PHP_EOL . "<br>";
				echo "Host information: " . mysqli_get_host_info($DB_LINK) . PHP_EOL . "<br>";
				echo "Status: " . mysqli_stat($DB_LINK) . "<br>";
				
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
			?>
		</body>
	</html>