<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['Submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("ticketreservation", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from admin where admin_id='$username' and admin_password='$password'", $connection);

$rows = mysql_num_rows($query);

if ($rows !=0) {
$_SESSION['login_user']=$username; // Initializing Session
//mysql_query("insert into admin (admin_id,admin_password) values('$username','$password')") or die(mysql_error());
header("location: dashboard.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";

	}
mysql_close($connection); // Closing Connection
}
}
echo $error;

?>
