<html>
<head></head>
<body>
<h1>
<?php echo "UPDATE INFROMATION"; ?>
</h1>


<form method="post" action="update.php">
		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" value="<?php session_start();echo $_SESSION['first_name']; ?>" ><br><br>

		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" value="<?php session_start();echo $_SESSION['last_name']; ?>" ><br><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" value="<?php session_start();echo $_SESSION['password']; ?>" ><br><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" value="<?php session_start();echo $_SESSION['password']; ?>"><br><br>

		<input type="submit" name="update" value="Update">

	</form>


</body>
</html>


