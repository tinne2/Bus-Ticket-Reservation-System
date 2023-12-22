<?php session_start();
use SunMailer\View;
 require 'SunMailer/autoload.php';
 require_once("dompdf/dompdf_config.inc.php");
 

/** pdf print  **/

	if(isset($_SESSION['reportorder']))
	{
	
	
	$order = View::render('reports.order', [

				'sl'				=>	1,
				'booking-id'		=>  $_SESSION['reportorder']['booking-id'],
				'coach-no'			=>  $_SESSION['reportorder']['coach-no'],
				'seat-no'			=>	$_SESSION['reportorder']['seat-no'],
				'boarding-point'	=>	$_SESSION['reportorder']['boarding-point'],
				'droping-point'		=> 	$_SESSION['reportorder']['droping-point'],
				'booking-date'		=> 	$_SESSION['reportorder']['booking-date'],
				'booking-time'		=> 	$_SESSION['reportorder']['booking-time'],
				'fare-per-seat'		=> 	$_SESSION['reportorder']['fare-per-seat'],
				'total'				=>	$_SESSION['reportorder']['total'],
				'name'				=>  $_SESSION['name'],
				'email'				=>	$_SESSION['email']
		]);
		
		set_time_limit(0);
		unset($_SESSION['reportorder']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		
		$dompdf = new DOMPDF();
		$dompdf->load_html($order);
		$dompdf->render(); 
		$dompdf->stream("Seat Order.pdf"); 
		
			
	}
	
	/*************************/