<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "PASSWORD";
$dbname = "dblab";
$email= $_SESSION['email'];
// echo "<p> $_SESSION['hey'] </p>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);    
$sql = "DELETE FROM users WHERE email = '$email' ";  //JUST CHANGE THE QUERY!!!
if ($_SERVER['REQUEST_METHOD'] == "POST") {
if(mysqli_query($conn, $sql)){
    echo "Record was deleted successfully.";

} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($conn);
}
}
?>