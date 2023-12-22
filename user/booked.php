<?php
try {
    if( isset ( $_POST['Checkout'] )) {

        
        $coachNo   = $_POST['coachid'];
        $seatNo    = $_POST['seatno'];
        $from      = $_POST['from'];
        $to        = $_POST['to'];
        $date      = $_POST['date'];
        $time      = $_POST['time'];


        $connection = mysql_connect("localhost", "root", "");

        $db = mysql_select_db("ticketreservation", $connection);

        $query = "INSERT INTO booking(coach_no, seat_no, boarding_point, droping_point, booking_date, booking_time) VALUES ('{$coachNo}','{$seatNo}' ,'{$from}','{$to}','{$date}' ,'{$time}')";

        $result = mysql_query($query, $connection);

        if ($result) {
            header("Location: seat6.php?checkout=success&busid={$coachNo}&from={$from}&to={$to}&date={$date}&time={$time}");
        } else {
            header("Location: seat6.php?checkout=error&busid={$coachNo}&from={$from}&to={$to}&date={$date}&time={$time}");
        }
    }
}catch (Exception $e) {
    echo $e->getMessage();
}
