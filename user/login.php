<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['Submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$Email=($_POST['email']);
$Password=($_POST['password']);
// To protect MySQL injection for Security purpose
/*$Email = stripslashes($Email);
$Password = stripslashes($Password);
$Email = mysql_real_escape_string($Email);
$Password= mysql_real_escape_string($Password);*/
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("ticketreservation", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from user1 where Email='$Email' and Password='$Password' LIMIT 1", $connection);
$rows = mysql_num_rows($query);
$result = mysql_fetch_array($query);
if ($rows!=0) {
$_SESSION['login_user']=$Email; // Initializing Session
$_SESSION['user_id'] = $result['id']; // to hold user id
$_SESSION['email']  = $Email;
$_SESSION['name']	= $result['Name'];
//mysql_query("insert into user1(Email,Password) VALUES ('$Email','$Password')") or die(mysql_error());//
header("location:buyticket.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";

	}
//mysql_close($connection); // Closing Connection
}
}

?>