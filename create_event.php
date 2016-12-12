<?php 
	include("db_connection.php");
	
	$locationQuery = "SELECT * FROM location";
	$resultLocation = mysqli_query($DB_LINK, $locationQuery);
	
	$option = "";
	while($theRow = mysqli_fetch_array($resultLocation)){
		$option = $option."<option value = \"$theRow[0]@$theRow[1]\"> $theRow[0] $theRow[2] $theRow[1]</option>";
	}
	
	//Get all the existing group
	$groupQuery = "SELECT * FROM a_group";
	$resultGroupID = mysqli_query($DB_LINK, $groupQuery);
	
	$groupOption = "";
	while($theRow2 = mysqli_fetch_array($resultGroupID)){
		$groupOption = $groupOption."<option value = '$theRow2[0]'> $theRow2[1] </option>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign Up for Event
		</title>
	</head>

	<body>
		<a href="homepage.php">Home</a>
		<a href="logout.php">Logout</a>
	
	<h1>Create Event Here!</h1>
		<form action "" method = "POST">
			<p>Title</p><input type="text" name="title">
			<p>Description</p><TEXTAREA name="description" ROWS=3 COLS =30></TEXTAREA>
			
<!--TODO: Put constraint on time so that start time cannot be after end time -->
			
			<p>Start Date</p>
			<select name = "YYYY">
			  <option value="2016">2016</option>
			  <option value="2017">2017</option>
			  <option value="2018">2018</option>
			  <option value="2019">2019</option>
			</select>
			<select name = "Month">
			  <option value="01">01</option>
			  <option value="02">02</option>
			  <option value="03">03</option>
			  <option value="04">04</option>
			  <option value="05">05</option>
			  <option value="06">06</option>
			  <option value="07">07</option>
			  <option value="08">08</option>
			  <option value="09">09</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			 </select>
			

			 <select name = "DD">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 31; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}
				?> 
			 </select>

			 <!-- <select name = "Tval">
			 	<option value="T">T</option>
			 </select> -->
			<p>Start time</p>
				 
			 <select name = "HH">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 23; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}
				?> 
			 </select>

			 <select name = "MM">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 59; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}
				?> 
			 </select>

			 <select name = "SS">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 59; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}

				?> 
			 </select>

			 <!-- <select name = "Zval">
			 	<option value="Z">T</option>
			 </select> -->
			 <!--  -->
			 <!--  -->
			 <!--  END OF START TIME -->
			 <!--  -->
			 <!--  -->
			 <p>End Date</p>

			<select name = "YYYYe">
			  <option value="2016">2016</option>
			  <option value="2017">2017</option>
			  <option value="2018">2018</option>
			  <option value="2019">2019</option>
			</select>
			<select name = "Monthe">
			  <option value="01">01</option>
			  <option value="02">02</option>
			  <option value="03">03</option>
			  <option value="04">04</option>
			  <option value="05">05</option>
			  <option value="06">06</option>
			  <option value="07">07</option>
			  <option value="08">08</option>
			  <option value="09">09</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			 </select>
			

			 <select name = "DDe">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 31; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}
				?> 
			 </select>

			 <!-- <select name = "Tvale">
			 	<option value="T">T</option>
			 </select> -->
				 <p>End time</p>

			 <select name = "HHe">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 23; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}
				?> 
			 </select>

			 <select name = "MMe">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 59; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}
				?> 
			 </select>

			 <select name = "SSe">
			 	<?php  
					for ($x = 0; $x <= 9; $x++) {
  						echo "<option value=0".$x. "> 0" .$x. "</option>";
					}
					for ($x = 10; $x <= 59; $x++) {
  						echo "<option value=".$x. ">" .$x. "</option>";
					}

				?> 
			 </select>

			 <!-- <select name = "Zvale">
			 	<option value="Z">T</option>
			 </select> -->

			 <!--  -->
			 <!-- END OF END TIME! -->
			 <!--  -->


			 <?php 
			 $varrStartTime = "".$_POST["YYYY"]. "-" .$_POST["Month"]. "-" .$_POST["DD"]. " " .$_POST["HH"]. ":" .$_POST["MM"]. ":" .$_POST["SS"];
			 ?>

			 <?php 
			 $varrEndTime = "".$_POST["YYYYe"]. "-" .$_POST["Monthe"]. "-" .$_POST["DDe"] . " " .$_POST["HHe"]. ":" .$_POST["MMe"]. ":" .$_POST["SSe"];
			 ?>



			
			<p>Location and Zip code</p>
			<select name="location">
				<?php echo $option; ?>
			</select>
			<p>Sponsored by</p>
			<select name = "groupID">
				<?php echo $groupOption; ?>
			</select>
			

			</br>
			<input type="submit" name="createEvent" />
		</form>



		<?php
			if(isset($_POST["createEvent"])){
				if(!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["location"]) && !empty($_POST["groupID"])){
					//Assign variables to user inputted values
					$eventTitle = stripslashes($_POST["title"]);
					$eventDescription = stripslashes($_POST["description"]);
					$eventStartTime = stripslashes($varrStartTime);
					$eventEndTime = stripslashes($varrEndTime);
					
					$eventLocationZipcode = explode('@', $_POST["location"], 2);
					
					$eventLocation = $eventLocationZipcode[0];
					$eventZipcode = $eventLocationZipcode[1];
					
					$groupID = stripslashes($_POST["groupID"]);
					
					$theQuery = "INSERT INTO an_event(title, description, start_time, end_time, location_name, zipcode) VALUES ('$eventTitle', '$eventDescription', '$eventStartTime', '$eventEndTime', '$eventLocation', '$eventZipcode')";
					
					$theResult = mysqli_query($DB_LINK, $theQuery);
					
					if($theResult){
						//Adds current event_id and groupID to organize
						$resultEventID = mysqli_insert_id($DB_LINK);
						$organizeQuery = "INSERT INTO organize(event_id, group_id) VALUES ('$resultEventID', '$groupID')";
						$resultOrganize = mysqli_query($DB_LINK, $organizeQuery);
						echo $eventTitle . " successfully created!";
					}
					else{
						//ERROR CHECKING
						error_reporting(E_ALL | E_WARNING | E_NOTICE);
						ini_set('display_errors', TRUE);

						echo "SQL Error: " . mysqli_error($DB_LINK);
						echo "</br>";
						echo "Could not create an event";
					}
				}
			}
		?>
	</body>
</html>