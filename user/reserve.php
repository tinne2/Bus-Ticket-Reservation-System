<?php
mysql_connect("localhost","root","") or die("Cannot Connect to the database!");
mysql_select_db("ticketreservation") or die("Cannot Connect to the database!");

//$id=($_REQUEST['id']);
//$Seat_Number=($_REQUEST['seatno']);
//$result = mysql_query("SELECT * FROM route WHERE id='$id'");
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if( isset( $_POST['field1'] ) ) {
         $field1 = '1';
    }
    else {
         $field1 = '0';
    }

    // shorter though:
    $field1 = isset( $_POST['field1'] ) ? $_POST['field1'] : '0';

    echo $field1;
}
?>
