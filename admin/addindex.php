<?php
mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("busreservatn") or die("Cannot Connect to the database!");

$CompanyName=$_POST['CompanyName'];
$Departing_Time=$_POST['Departing_Time'];
$Coach_No=$_POST['Coach_No'];
$Starting_Counter=$_POST['Starting_Counter'];
$End_Counter=$_POST['End_Counter'];
$Fare=$_POST['Fare'];
$Coach_Type=$_POST['Coach_Type'];
$Starting_Time=$_POST['Starting_Time'];
$Arrival_Time=$_POST['Arrival_Time'];
$Total_Seat=$_POST['Total_Seat'];

	$save=mysql_query("INSERT INTO
addbus(ID,COMPANY_NAME,DEPARTING_TIME,COACH_NO,STARTING_COUNTER,END_COUNTER,FARE,COACH_TYPE,STARTING_TIME,ARRIVAL_TIME,TOTAL_SEAT) VALUES
('','$CompanyName','$Departing_Time','$Coach_No','$Starting_Counter','$End_Counter','$Fare','$Coach_Type','$Starting_Time','$Arrival_Time','$Total_Seat')");

if($save==1){
  echo "<SCRIPT LANGUAGE='JavaScript'>
  window.alert('New User Added Successfully')
  window.location.href='busadd.php';
  </SCRIPT>";
  }
  else
  {
  echo"<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Failed To Data Insert')
  window.location.href='busadd.php';
  </SCRIPT>";
  }
  ?>