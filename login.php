<?php
session_start();
$db = mysqli_connect("localhost", "root", "PASSWORD", "dblab");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$_SESSION["email"]= $email;
	// Check if email is already in use
	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($db, $sql);
	$count = mysqli_num_rows($result);

	if ($count < 1) {
		echo "<p>Invalid email or password!</p>";
	} else {

        echo "<p>Hello $email </p>";
        while ($row = $result -> fetch_assoc()){

            printf("First name is: %s\n ", $row["first_name"]);
			echo "<br>";
			printf("Last Name is: %s\n" , $row["last_name"]);
			$_SESSION['first_name']=$row['first_name'];
			$_SESSION['last_name']=$row['last_name'];
			$_SESSION['password']=$row['password'];
        
        }
        echo "<br><a href='update1.php'>Update</a>"; 

        echo "<br><a href='delete.php' >Delete User</a>"; 

		echo "<p>Click Here to <a href='index.html'>Logout</a>.</p>";

	}
}
?>