<?php

mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");

function NewUser() { 
 
$Email = $_POST['email']; 
$Password = $_POST['password']; 
$Name=$_POST['name'];
$Phone=$_POST['phone'];
$City=$_POST['city'];
$Gender=$_POST['gender'];
$Nationality=$_POST['nationality'];

$query = "INSERT INTO user1 (Email,Password,Name,Phone,City,Gender,Nationality) VALUES ('$Email','$Password','$Name','$Phone','$City','$Gender','$Nationality')"; 
$data = mysql_query ($query)or die(mysql_error()); 
if($data) { 
//header("location:index.php"); // Redirecting To Other Page
echo "YOUR REGISTRATION IS COMPLETED..."; 
} 
} 
function SignUp() { 
if(!empty($_POST['email'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
{ 
$query = mysql_query("SELECT * FROM user1 WHERE Email = '$_POST[email]' AND Password = '$_POST[password]'") or die(mysql_error()); 
if(!$row = mysql_fetch_array($query) or die(mysql_error())) 
{
 newuser(); 
}
 else 
{ 
echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; 
} 
} 
} if(isset($_POST['Submit'])) {
 SignUp(); 
 } 
 ?>