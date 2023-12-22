<?php
mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");

$Card_Number=($_POST['cardno']);
$Pin_Number=($_POST['pinno']);
$Amount=($_POST['amount']);

$save=mysql_query("INSERT INTO card (id,Card_no,Pin_no,Amount) VALUES ('','$Card_Number','$Pin_Number','$Amount')");

if($save==1){
  echo "<SCRIPT LANGUAGE='JavaScript'>
  window.alert(' Added Successfully')
  window.location.href='card.php';
  </SCRIPT>";
  }
  else
  {
  echo"<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Failed To Data Insert')
  window.location.href='card.php';
  </SCRIPT>";
  }
  ?>
  