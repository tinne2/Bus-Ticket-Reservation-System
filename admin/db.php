<?php
$con=mysql_connect('localhost','root','');
if($con==true)
{
$link=mysql_select_db('ticketreservation',$con);
}
?>
