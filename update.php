<?php 
session_start();
printf("%s \n", $_SESSION['email']); 
$db = mysqli_connect("localhost", "root", "PASSWORD", "dblab");
$email=$_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email' ";
$result = mysqli_query($db, $sql);
$row = $result -> fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// collect value of input field
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	$confirm_password=$_POST['confirm_password'];


		// Validate password strength
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
			echo "<p>Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.</p>";
		}
		else if($password!=$confirm_password){
			echo "<p> Both password and confirm password don't match. </p>";
		} 
		else{
  $sql="UPDATE users SET first_name='$first_name', last_name ='$last_name', password= '$password' WHERE email='$email'";
  if ($db -> query($sql))
  {
	echo "Record updated successfully";
    
  }
}
	
  }
?>
