<?php
$link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");

$id=$_REQUEST['id'];
$CompanyName=$_REQUEST['companyname'];
$Departing_Time=$_REQUEST['departingtime'];
$Coach_No=$_REQUEST['coachno'];
$Starting_Counter=$_REQUEST['startingcounter'];
$End_Counter=$_REQUEST['endcounter'];
$Fare=$_REQUEST['fare'];
$Coach_Type=$_REQUEST['coachtype'];
$Starting_Time=$_REQUEST['startingtime'];
$Arrival_Time=$_REQUEST['arrivaltime'];
$Total_Seat=$_REQUEST['totalseat'];
$Day=$_REQUEST['day'];
//$Seat_Number=($_REQUEST['seatno']);


 //$update_sql =mysql_query( "UPDATE from bus WHERE COACH_NO=$Coach_No;");
//$query2=mysql_query($update_sql);
// update data in mysql database 
$query = "UPDATE bus SET  COMPANY_NAME='".$CompanyName."', DEPARTING_TIME='".$Departing_Time."' ,COACH_NO='".$Coach_No."' ,STARTING_COUNTER='".$Starting_Counter."', END_COUNTER='".$End_Counter."' ,FARE='".$Fare."' ,COACH_TYPE='".$Coach_Type."' ,STARTING_TIME='".$Starting_Time."',ARRIVAL_TIME='".$Arrival_Time."' ,TOTAL_SEAT='".$Total_Seat."',Day='".$Day."' WHERE id='".$id."'";

//$query = "UPDATE bus SET COACH_NO='".$Coach_No."' WHERE id='".$id."'";
//$query2=mysql_query($update_sql,$link);



if(!mysql_query($query,$link))
		  {echo "<SCRIPT LANGUAGE='JavaScript'>
  window.alert('Failed To Data Update')
  window.location.href='busview.php';
  </SCRIPT>";
  }
  else
  {
  echo"<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Record updated successfully!')
  window.location.href='busview.php';
  </SCRIPT>";
  }
	 ?>






