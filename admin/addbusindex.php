<?php
mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");

$CompanyName=($_POST['companyname']);
$Departing_Time=($_POST['departingtime']);
$Coach_No=($_POST['coachno']);
$Starting_Counter=($_POST['startingcounter']);
$End_Counter=($_POST['endcounter']);
$Fare=($_POST['fare']);
$Coach_Type=($_POST['coachtype']);
$Starting_Time=($_POST['startingtime']);
$Arrival_Time=($_POST['arrivaltime']);
$Total_Seat=($_POST['totalseat']);
$Day=($_POST['day']);
//$Seat_Number=($_POST['seatno']);



$save=mysql_query("INSERT INTO bus(ID,COMPANY_NAME,DEPARTING_TIME,COACH_NO,STARTING_COUNTER,END_COUNTER,FARE,COACH_TYPE,STARTING_TIME,ARRIVAL_TIME,TOTAL_SEAT,Day) VALUES ('','$CompanyName','$Departing_Time','$Coach_No','$Starting_Counter','$End_Counter','$Fare','$Coach_Type','$Starting_Time','$Arrival_Time','$Total_Seat','$Day')");


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
  
