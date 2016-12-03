<!DOCTYPE html>
<html>
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
		// echo "Success: A proper connection to MySQL was made!" . PHP_EOL . "<br>";
 		//echo "Host information: " . mysqli_get_host_info($DB_LINK) . PHP_EOL . "<br>";
 		//echo "Status: " . mysqli_stat($DB_LINK) . "<br>";
	?>
</html>
