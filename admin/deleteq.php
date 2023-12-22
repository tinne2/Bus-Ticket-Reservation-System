<?php
	
	$link=mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
	mysql_select_db("ticketreservation",$link) or die("Cannot select the database!");

if(isset($_GET['id']))
{
$id=$_GET['id'];
 $update_sql = "DELETE from bus WHERE id=$id;";
$query2=mysql_query($update_sql,$link);
}
if($query2==true )

 
		  {
		  echo"<SCRIPT LANGUAGE='Javascript'>
		  window.alert(' Data Deleted Successfully')
		 window.location.href='busview.php';
		  </SCRIPT>";
		  }
		  else
		    {
			 echo"<SCRIPT LANGUAGE='Javascript'>
		 window.alert(' Failed')
				 window.location.href='busview.php';

		  </SCRIPT>";
             }
?>
