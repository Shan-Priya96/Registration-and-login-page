<?php
session_start();
$db = mysqli_connect("localhost", "root", "PASSWORD", "dblab");

if (isset($_POST['register'])) {
	$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);

	// Check if email is already in use
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		echo "<p>Email already in use.</p>";
	} else {
		// Validate password strength
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
			echo "<p>Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.</p>";
		} else if($password!=$confirm_password){
			echo "<p> Both passwords are not the same. </p>";
		} 
		else{
			// Insert user data into MySQL database
			$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
			mysqli_query($db, $sql);

			echo "<p>Registration successful!</p>";

			
			echo "<p>Click Here to <a href='login.html'>Login</a>.</p>";
		 
		}
	}
}
?>