<?php
	
mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");


$Coach_No=$_POST['coachno'];
 $update_sql =mysql_query( "DELETE from bus WHERE COACH_NO=$Coach_No;");
//$query2=mysql_query($update_sql);

if($update_sql==1)

 
		  {
		  echo"<SCRIPT LANGUAGE='Javascript'>
		  window.alert(' Data Deleted Successfully')
		 window.location.href='busdelete.php';
		  </SCRIPT>";
		  }
		  else
		    {
			 echo"<SCRIPT LANGUAGE='Javascript'>
		 window.alert(' Failed')
				 window.location.href='busdelete.php';

		  </SCRIPT>";
             }
?>