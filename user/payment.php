<?php
include('session.php');
		// first check if form submit
	if ( isset( $_POST['Submit']))
	{
		// conection for database
		$connection = mysql_connect("localhost", "root", "");

        $db = mysql_select_db("ticketreservation", $connection);
		// run query
		$query = "SELECT * FROM card where Card_no = {$_POST['cardno']} AND Pin_no = {$_POST['pinno']}" ;

		// fatch result
		$result = mysql_query($query);

		// if card number & pin match
		if ($result)
		{
			while($cardInfo = mysql_fetch_assoc ($result) )
		    {
		    	// seat fare
				$fare 		= $_POST['fare'];

		    	// if card number amount is equals to bus fare num 
		    	// then only payment process success and
		    	// bus booked successfully
		        if($fare == $cardInfo['Amount'])
		        {
		        	// booking
		        	$coachNo   = $_POST['coachid'];
			        $seatNo    = $_POST['seatno'];
			        $from      = $_POST['from'];
			        $to        = $_POST['to'];
			        $date      = $_POST['date'];
			        $time      = $_POST['time'];


			        // $connection = mysql_connect("localhost", "root", "");

			        // $db = mysql_select_db("ticketreservation", $connection);

			        $cardno = $_POST['cardno'];
			        $amount = $cardInfo['Amount'];

			        $query = "INSERT INTO payment(card_no, amount) values ('{$cardno}', '{$amount}') ";
			        
			        $result = mysql_query($query, $connection);

			        $query = "INSERT INTO booking(coach_no, seat_no, boarding_point, droping_point, booking_date, booking_time) VALUES ('{$coachNo}','{$seatNo}' ,'{$from}','{$to}','{$date}' ,'{$time}')";

			        $result = mysql_query($query, $connection);

			        if ($result) {
			            header("Location: seat6.php?checkout=success&busid={$coachNo}&from={$from}&to={$to}&date={$date}&time={$time}");
			        } else {
			            header("Location: seat6.php?checkout=error&busid={$coachNo}&from={$from}&to={$to}&date={$date}&time={$time}");
			        }
		        } 
		        // if bus fare amount does not match with card number (Amount)
		        // then shows and error message
		        else {
		        	$errors = "Please Insert a Card Number with Ammount ".$fare;
		        }
   			}

		}
		// if card number and pin does not match
		else {
			$errors = "Invalid Card Number/ Pin Number";
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.
org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Page</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
 
<!--  checkbox styling script -->
<script src="js/jquery/ui.core.js" type="text/javascript"></script>
<script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  


<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>


<!--  styled select box script version 2 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
	$("input.file_1").filestyle({ 
	image: "images/forms/upload_file.gif",
	imageheight : 29,
	imagewidth : 78,
	width : 300
	});
});
</script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 

<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="js/jquery/date.js" type="text/javascript"></script>
<script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<style type="text/css">

</style>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">

	<!-- start logo -->
	<div id="logo">
	<a href=""><img src="images/logo-dbbl.jpg" width="156" height="40" alt="" /></a>	</div>
	<!-- end logo -->
	
	<!--  start top-search -->
	<!--<div id="top-search">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<td>
		 
		<select  class="styledselect">
			<option value="">All</option>
			<option value="">Products</option>
			<option value="">Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		 
		</td>
		<td>
		<input type="image" src="images/shared/top_search_btn.gif"  />
		</td>
		</tr>-->
		</table>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">
		
			<div class="nav-divider">&nbsp;</div>
			<!--<div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="95" height="16" alt="" /></div> <!--w=93,h=14-->
			<div class="nav-divider">&nbsp;</div>
			<?php echo $login_session; ?>

			<a href="logout.php" id="logout"><img src="images/shared/nav/image_04.gif" width="70" height="20" alt="" /></a>  <!--w=64,h=14-->
			<div class="clear">&nbsp;</div>
		
			<!--  start account-content -->	
			<div class="account-content">
			<div class="account-drop-inner">
				<a href="" id="acc-settings">Settings</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-details">Personal details </a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-project">Project details</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-inbox">Inbox</a>
				<div class="clear">&nbsp;</div>
				<div class="acc-line">&nbsp;</div>
				<a href="" id="acc-stats">Statistics</a>			</div>
			</div>
			<!--  end account-content -->
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		<ul class="current"><li><a href=""><b>User Payment</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--	<div class="select_sub">
		<ul class="sub">
				<li><a href="#nogo">Dashboard Details 1</a></li>
				<li><a href="#nogo">Dashboard Details 2</a></li>
				<li><a href="#nogo">Dashboard Details 3</a></li>
			</ul>
		</div>-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		<!--<ul class="select"><li><a href="busadd.php"><b>Bus Add</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--<div class="select_sub show">
			<ul class="sub">
				<li><a href="#nogo">View all products</a></li>
				<li class="sub_show"><a href="#nogo">Add product</a></li>
				<li><a href="#nogo">Delete products</a></li>
			</ul>
		</div>-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		<!--<ul class="select"><li><a href="busview.php"><b>Bus View</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--<div class="select_sub show">
			<ul class="sub">
				<li><a href="#nogo">View all products</a></li>
				<li class="sub_show"><a href="#nogo">Add product</a></li>
				<li><a href="#nogo">Delete products</a></li>
			</ul>
		</div>-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<!--<ul class="select"><li><a href="busmodify.php"><b>Bus Modify</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">Categories Details 1</a></li>
				<li><a href="#nogo">Categories Details 2</a></li>
				<li><a href="#nogo">Categories Details 3</a></li>
			</ul>
		</div>-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="nav-divider">&nbsp;</div>
		
		<!--<ul class="select"><li><a href="busdelete.php"><b>Bus Delete</b><!--[if IE 7]><!--></a><!--<![endif]-->
		<!--[if lte IE 6]><table><tr><td><![endif]-->
		<!--<div class="select_sub">
			<ul class="sub">
				<li><a href="#nogo">News details 1</a></li>
				<li><a href="#nogo">News details 2</a></li>
				<li><a href="#nogo">News details 3</a></li>
			</ul>
		</div>-->
		<!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		</ul>
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->
 
 <div class="clear"></div>
 
<!-- start content-outer -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Payment</h1></div>
<!--  start product-table ..................................................................................... -->



 <form action="" method="post">
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">

	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>

		<!--- All information for check out process -->
        <input name="coachid" type="hidden" value="<?php echo $_POST['coachid'] ?>"/>
        <input name="seatno" type="hidden" value="<?php echo $_POST['seatno'] ?>"/>
        <input name="fare" type="hidden" value="<?php echo $_POST['fare'] ?>"/>
        <input name="from" type="hidden" value="<?php echo $_POST['from'] ?>"/>
        <input name="to" type="hidden" value="<?php echo $_POST['to'] ?>"/>
        <input name="date" type="hidden" value="<?php echo $_POST['date'] ?>"/>
        <input name="time" type="hidden" value="<?php echo $_POST['time'] ?>"/>
	
		<!-- Show errors -->
		<?php if (isset ($errors) ) { ?>

		<div class="error">

			<strong><?php echo $errors ?></strong>
			

		</div>
		<?php } ?>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Name on card</th>
			<td><input type="text" class="inp-form" name="name" /></td>
			<td></td>
		</tr>
		<!--<tr>
			<th valign="top">Email:</th>
			<td><input type="text" class="inp-form" /></td>
			<!--<td>
			<div class="error-left"></div>
			<div class="error-inner">This field is required.</div>
			</td>-->
		</tr>
		<tr>
			<th valign="top">Card number</th>
			<td><input type="text" class="inp-form" name="cardno" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Pin Number</th>
			<td><input type="text" class="inp-form" name="pinno" /></td>
			<td></td>
		</tr>
		
			
		<!--<tr>
		<th valign="top">PIN:</th>
		<td><input type="text" class="inp-form" name="pin" /></td>
		<!--<td>	
		<select  class="styledselect_form_1">
			<option value="">All</option>
			<option value="">Products</option>
			<option value="">Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select>-->
		<!--</td>
		<td></td>
		</tr> 

		<tr>
		<th valign="top">Balance:</th>
				<td><input type="text" class="inp-form" name="balance" /></td>
         </td>
		<td></td>
		</tr> 
		<!--<td class="noheight">
		
			<table border="0" cellpadding="0" cellspacing="0">
			<tr  valign="top">
				<td>
				<form id="chooseDateForm" action="#">
				
				<select id="d" class="styledselect-day">
					<option value="">dd</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				</td>
				<td>
					<select id="m" class="styledselect-month">
						<option value="">mmm</option>
						<option value="1">Jan</option>
						<option value="2">Feb</option>
						<option value="3">Mar</option>
						<option value="4">Apr</option>
						<option value="5">May</option>
						<option value="6">Jun</option>
						<option value="7">Jul</option>
						<option value="8">Aug</option>
						<option value="9">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
				</td>
				<td>
					<select  id="y"  class="styledselect-year">
						<option value="">yyyy</option>
						<option value="1970">1970</option>
						<option value="1971">1971</option>
						<option value="1972">1972</option>
						<option value="1973">1973</option>
						<option value="1974">1974</option>
						<option value="1975">1975</option>
						<option value="1976">1976</option>
						<option value="1977">1977</option>
						<option value="1978">1978</option>
						<option value="1979">1979</option>
						<option value="1980">1980</option>
						<option value="1981">1981</option>
						<option value="1982">1982</option>
						<option value="1983">1983</option>
						<option value="1984">1984</option>
						<option value="1985">1985</option>
						<option value="1986">1986</option>
						<option value="1987">1987</option>
						<option value="1988">1988</option>
						<option value="1989">1989</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
						<option value="1999">1999</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
					</select>
					</form>
				</td>
				<td><a href=""  id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></a></td>
			</tr>
			</table>
		
		</td>
		<td></td>
	</tr>-->
	
			<!--<tr>
			<th valign="top">Description:</th>
			<td><input type="text" class="inp-form" name="description" /></td>
			<td></td>
		</tr>
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
           <input type="submit" value="Submit"  name="Submit"  class="form-submit" />
			<!--<input type="reset" value="" class="form-reset"  />-->
		</td>
		<th>&nbsp;</th>
		<td valign="top">
           <input type="submit" value="Submit"  name="Submit"  class="form-submit" />
		<td></td>
	</tr>
	</table>
		</form>

	<!-- end id-form  -->

	</td>
	<td>

	<!-- end related-activities -->

</td>
</tr>
<tr>
<td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>



<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>

<!--  end content-outer -->

 

<div class="clear">&nbsp;</div>
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	Admin Skin &copy;  <a href=""></a>. All rights reserved.</div>
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>




