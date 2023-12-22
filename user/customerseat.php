<?php
mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");

$A1 = $_POST["field1"];
$B1 = $_POST["field2"];
$C1 = $_POST["field3"];
$D1 = $_POST["field4"];
$E1 = $_POST["field5"];
$F1 = $_POST["field6"];
$G1 = $_POST["field7"];
$A2 = $_POST["field8"];
$B2 = $_POST["field9"];
$C2 = $_POST["field10"];
$D2 = $_POST["field11"];
$E2 = $_POST["field12"];
$F2 = $_POST["field13"];
$G2 = $_POST["field14"];
$A4 = $_POST["field15"];
$B4 = $_POST["field16"];
$C4 = $_POST["field17"];
$D4 = $_POST["field18"];
$E4 = $_POST["field19"];
$F4 = $_POST["field20"];
$G4 = $_POST["field21"];
$A3 = $_POST["field22"];
$B3 = $_POST["field23"];
$C3 = $_POST["field24"];
$D3 = $_POST["field25"];
$E3 = $_POST["field26"];
$F3 = $_POST["field27"];
$G3 = $_POST["field28"];
$Submit=$_POST["Submit"];
//if(isset($_POST['field1']))
if(A1=0;A1<8;A1++)
{
echo Form::checkbox('field1', '1', true);
}else{
    echo "data-off=A1";
}
//if (isset($_POST['Submit'])) {
 //   if ($_POST['field1'] == 'checkbox') {
   //     echo 'g';
//}
//}
$save=mysql_query("INSERT INTO 
selectseat(ID,FIELD1,FIELD2,FIELD3,FIELD4,FIELD5,FIELD6,FIELD7,FIELD8,FIELD9,FIELD10,FIELD11,FIELD12,FIELD13,FIELD14,FIELD15,FIELD16,FIELD17,FIELD18,FIELD19,FIELD20,FIELD21,FIELD22,FIELD23,FIELD24,FIELD25,FIELD26,FIELD27,FIELD28) VALUES 
('','$A1','$B1','$C1','$D1','$E1','$F1','$G1','$A2,','$B2','$C2', '$D2', '$E2', '$F2', '$G2', '$A4', '$B4', '$C4', '$D4', '$E4', '$F4', '$G4', '$A3', '$B3', '$C3', '$D3','$E3', '$F3', '$G3')");

if($save==1){
  echo "<SCRIPT LANGUAGE='JavaScript'>
window.alert('the button is checked')
  window.location.href='seat6.php';
  </SCRIPT>";
  }
  else
  {
  echo"<SCRIPT LANGUAGE='JavaScript'>
   window.alert('Failed To check')
  window.location.href='seat6.php';
  </SCRIPT>";
  }  
?>