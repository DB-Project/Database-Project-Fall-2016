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
			Find Friends
		</title>
		<style type = "text/css">
		  table, th, td {border: 1px solid black};
		 </style>
	</head>

	<body>
		<a href="index.php">Home</a>
		<a href="signup.php">Sign Up</a>
		<a href="login.php">Login</a>
		<p>Select an interest!</p>
				<form action "" method = "POST">
					<p>Category</p>
					<select name = "interest">
						<?php echo $option; ?>
					</select>
					</br>
					<input type="submit" name="searchInterest" />
				</form>
					
		<?php
			include("search.php");
		
			echo "<br> This is the public page </br>";
			echo "<br> There will be event details for the next three days </br>";

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
