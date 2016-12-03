<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign Up Page
		</title>
	</head>

	<body>
      <h1>Please sign up here</h1>
			<form action="homepage.php" method="POST">
				<p>Username:</p><input type="text" name="user">
				<p>Password:</p><input type="password" name="pass">
				<p>First name:</p><input type="text" name="firstname">
				<p>Last name:</p><input type="text" name="lastname">
				<p>Email:</p><input type="email" name="email">
				<p>Zipcode:</p><input type="text" name="zipcode">
				<br />
				<input type="submit" name="signup" />
			</form>

	</body>
</html>
