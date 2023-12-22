<?php session_start();


	
    $connection = mysql_connect("localhost", "root", "");

    $db = mysql_select_db("ticketreservation", $connection);

    $ses_sql=mysql_query("select fare from bus where coach_no = {$_GET['busid'] }", $connection);

    $bus = mysql_fetch_assoc($ses_sql);
    $booking_date = date('Y-m-d',strtotime($_GET['date']));

    $bookedSeats =  mysql_query("select seat_no from booking where coach_no = {$_GET['busid']} AND booking_date = '{$booking_date}' AND booking_time = '{$_GET['time']}' ", $connection);

    $booked = array();


    while($bookedSeat = mysql_fetch_assoc ($bookedSeats) )
    {
        if($multipleSeatReservation = explode(',',$bookedSeat['seat_no']))
        {
            foreach($multipleSeatReservation as $singleSeatReservation )
                $booked[] = $singleSeatReservation;
        }
        else
        {
            $booked[] = $bookedSeat['seat_no'];
        }
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/style4.css" rel="stylesheet" type="text/css" />
<script src="js/jquery/jquery26.min.js" type="text/javascript"></script>

 <meta charset="utf-8">



<style>
body { 
  margin: 0 0; 
  padding:3px 0; 
  text-align:center; 
} 
 
#bg { 
    position:fixed;  
    top:-50%;  
    left:-50%;  
    width:100%;  
    height:100%; 
}
div {
    color: red;
    font-size: 15px;/*35px;*/
}
#bg img { 
    position:absolute;  
    top:0;  
    left:0;  
    right:0;  
    bottom:0;  
    margin:auto;  
    min-width:50%; 
    min-height:50%; 
} 
 
.checkbox { 
  display:inline-block; 
  position:relative; 
  text-align:left; 
  width:60px; /*60*/
  height:30px; /*30*/
  background-color:#484850 ; /*#484850*/
  overflow:hidden; 
  box-shadow:inset 0 10px 25px rgba(0,0,0, .5), 0px 1px 2px #fff; 
  -webkit-border-radius:20px; 
  -moz-border-radius:20px; 
  border-radius:20px; 
  margin:10px;
} 
 
.checkbox input { 
  display:block; 
  position:absolute; 
  top:0; 
  right:0; 
  bottom:0; 
  left:0; 
  width:100%; 
  height:100%; 
  margin:0 0; 
  cursor:pointer; 
  opacity:0; 
  filter:alpha(opacity=0); 
  z-index:2;
}

.var4-bg {
     background: none;
}
 
.checkbox label { 
  background-color: #151b29; /*#151b29;*/
  background-image:-webkit-linear-gradient(-40deg,rgba(0,0,0,0),rgba(255,255,255,0.1),rgba(0,0,0,0.2)); 
  background-image:-moz-linear-gradient(-40deg,rgba(0,0,0,0),rgba(255,255,255,0.1),rgba(0,0,0,0.2)); 
  background-image:-ms-linear-gradient(-40deg,rgba(0,0,0,0),rgba(255,255,255,0.1),rgba(0,0,0,0.2)); 
  background-image:-o-linear-gradient(-40deg,rgba(0,0,0,0),rgba(255,255,255,0.1),rgba(0,0,0,0.2)); 
  background-image:linear-gradient(-40deg,rgba(0,0,0,0),rgba(255,255,255,0.1),rgba(0,0,0,0.2)); 
  -webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1),0 1px 2px rgba(0,0,0,0.7); 
  -moz-box-shadow:0 0 0 1px rgba(0,0,0,0.1),0 1px 2px rgba(0,0,0,0.7); 
  box-shadow:0 0 0 1px rgba(0,0,0,0.1),0 1px 2px rgba(0,0,0,0.7); 
  -webkit-border-radius:20px; 
  -moz-border-radius:20px; 
  border-radius:20px; 
  display:inline-block; 
  width:30px; 
  text-align:center; 
  font:bold 10px/28px Arial,Sans-Serif; 
  color:#999; 
  text-shadow:0 -1px 0 rgba(0,0,0,0.7); 
  -webkit-transition:margin-left 0.2s ease-in-out; 
  -moz-transition:margin-left 0.2s ease-in-out; 
  -ms-transition:margin-left 0.2s ease-in-out; 
  -o-transition:margin-left 0.2s ease-in-out; 
  transition:margin-left 0.2s ease-in-out; 
  margin:1px; 
} 
 
.checkbox label:before { 
  content:attr(data-off); 
} 
 
.checkbox input:checked + label { 
  margin-left:29px; 
  /* green when 'on'  
  background-color: #429f21; 
  */ 
   
  /* blue when 'on' */ 
  background-color: #009900;/*#0088cc;*/ 
   
  color:white; 
} 
 
.checkbox input:checked + label:before { 
  content:attr(data-on); 
} 
table, th, td {
    border: 1px solid black;
    padding: 5px;
}

td#t01 {

    border: 1px solid white;
}

table {
    border-spacing: 15px;
    width: 100%;
}
.show-seat-order {
    margin-top: 50px;
}

.footer {
    margin: 0 auto;
    width: 1060px;
    height: 70px;
    margin-top: 142px;
    background-color: #FFFFFF;
    border-radius-bottom-left: 10px;
    clear: both;
    display: block;
    overflow: hidden;
    padding-top: 100px;
}
#total
{
    margin-top: 30px;
    background-color: #009900;
    display: block;
    padding: 15px;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 20px;
    border: 2px solid #333;
    border-radius: 10px;
    width: 625px;
}
.notification-success
 {
     background-color: #dff0d8;
     border: 2px solid #d6e9c6;
     border-radius: 5px;
     display: block;
     padding: 15px;
     margin: 0 auto;
     margin-bottom: 25px;
     width: 1026px;
     margin-top: 25px;
     color: #3c763d;
 }
.notification-error
{
    background-color: #f2dede;
    border: 2px solid #ebccd1;
    border-radius: 5px;
    display: block;
    padding: 15px;
    margin: 0 auto;
    margin-bottom: 25px;
    width: 1026px;
    margin-top: 25px;
    color: #a94442;
}
.btn-submit
{
    background-color: #008CBA;
    color: #fff;
    font-weight: bold;
    border: 0;
    padding: 20px;
    border-radius: 10px;
    cursor: pointer;
}
.btn-submit:hover
{
    background-color: #007095;
    color: #fff;
    border: 0;
    padding: 20px;
    border-radius: 10px;
    cursor: pointer;
}
.input-checkout
{
    height: 50px;
    font-size: 15px;
    font-weight: 900;
    color: green;
    text-align: center;
    background-color: #F5F5F5;
    pointer-events:none;
}
.right1 {
    width: 570px;
}
</style>
<style type="text/css">
<!--
.style1 {color: #400080}
-->
</style>
</head>

<body>
<!--<div class="var"></div>-->

<div class="header">
<div class="left"><img src="images/logo-dbbl.jpg" width="188" height="82"  /></div>
<div class="right">
<!--<div class="toggler"> 
   
    <!--<input type="radio" id="t1" name="toggle_option" checked=""> 
   
    <input type="radio" id="t2" name="toggle_option"> 
   
    <input type="radio" id="t3" name="toggle_option"> 
   
  <input type="radio" id="t4" name="toggle_option"> -->
   
  <!--<label for="t1"> 
    <span class="fa fa-facebook"></span> 
  </label> 
  <label for="t2"> 
    <span class="fa fa-twitter"></span> 
  </label> 
    <label for="t3"> 
    <span class="fa fa-github"></span> 
  </label> -->
    <!--<label for="t4"> 
    <span class="fa fa-dribbble"></span> 
  </label>-->
  <!--<div class="slider"></div> -->
</div> 

<!--<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->
 
 
</div>
</div>

<div class="menu2">

<div class="logout"><a href="logout.php"><strong>Logout</strong></a></div>	  

</div>

<!--<div class="var-menu">
<ul class="menu">
</div>-->
<div align="center">
  <!--<li><a href="dashboard.html">Dashboard</a></li>-->
  <!--<li><a href="busadd.html">Bus Add</a></li>-->
  <!--<li><a href="busview.html">Bus View</a></li>-->
  <!--<li><a href="busmodify.html">Bus Modify</a></li>-->
  <!--<li><a href="busdelete.html">Bus Delete</a></li>-->
  <!--<li><a href="admin.html">Logout</a></li>-->
</div>

    <!-- notification -->
    <?php
        if( isset ($_GET['checkout']) )
        {
            if ( $_GET['checkout'] == "success" )
            {
                ?>
                <div class="notification-success">
                    <strong>The seat has been booked successfully. Please, click [ <a href="#" onclick="report()">here</a> ] to print order details.</strong>
                </div>
                <?php
            }
            else
            {
                ?>
                <div class="notification-error">
                    <strong>Something wrong here. Please, contact with admin.</strong>
                </div>
                <?php
            }
        }

    ?>



  <form id="form1" name="form1" method="post" action=""  >
  

<div class="var4-bg">

<div class="content">

<div class="left1">
<div class="leftw">
<div align="center">Driver</div>
</div>
<div class="leftbg">

    <!-- A1 Field -->
    <div>
        <span class="checkbox">
            <input type="checkbox" id="booked_A1"  value="A1" name="fieldMark[correct00]"  class="css-checkbox"
                <?php echo ( in_array('A1',$booked) )? 'Checked' : '' ?>
                >
            <label  data-on="A1" data-off="A1"></label>
        </span>
    </div> <!-- ./ A1 Field -->
    <div>
        <span class="checkbox">
            <input type="checkbox" id="booked_B1" value="B1" name="fieldMark[correct00]"  class="css-checkbox"
                <?php echo ( in_array('B1',$booked) )? 'Checked' : '' ?>
                >
            <label data-on="B1" data-off="B1"></label>
        </span>
    </div>
<div>

<span class="checkbox"> 
    <input type="checkbox" id="booked_C1" value="C1" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('C1',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="C1" data-off="C1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_D1" value="D1" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('D1',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="D1" data-off="D1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_E1" value="E1" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('E1',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="E1" data-off="E1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_F1" value="F1" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('F1',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="F1" data-off="F1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_G1" value="G1" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('G1',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="G1" data-off="G1"></label> 
</span> 
</div>
</div>

<div class="leftbg">
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_A2" value="A2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('A2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="A2" data-off="A2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_B2" value="B2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('B2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="B2" data-off="B2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_C2" value="C2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('C2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="C2" data-off="C2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_D2" value="D2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('D2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="D2" data-off="D2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_E2" value="E2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('E2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="E2" data-off="E2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_F2" value="F2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('F2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="F2" data-off="F2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_G2" value="G2" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('G2',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="G2" data-off="G2"></label> 
</span> 
</div>

</div>
 <div class="leftbg3">
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_A4" value="A4" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('A4',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="A4" data-off="A4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_B4" value="B4" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('B4',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="B4" data-off="B4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_C4" value="C4" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('C4',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="C4" data-off="C4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
   <input type="checkbox" id="booked_D4" value="D4" name="fieldMark[correct00]"  class="css-checkbox"
       <?php echo ( in_array('D4',$booked) )? 'Checked' : '' ?>
       >
    <label data-on="D4" data-off="D4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_E4" value="E4" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('E4',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="E4" data-off="E4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
   <input type="checkbox" id="booked_F4" value="F4" name="fieldMark[correct00]"  class="css-checkbox"
       <?php echo ( in_array('F4',$booked) )? 'Checked' : '' ?>
       >
    <label data-on="F4" data-off="F4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_G4" value="G4" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('G4',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="G4" data-off="G4"></label> 
</span> 
</div>
</div>

<div class="leftbg3">
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_A3" value="A3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('A3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="A3" data-off="A3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_B3" value="B3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('B3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="B3" data-off="B3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_C3" value="C3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('C3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="C3" data-off="C3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_D3" value="D3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('D3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="D3" data-off="D3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_E3" value="E3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('E3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="E3" data-off="E3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_F3" value="F3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('F3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="F3" data-off="F3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" id="booked_G3" value="G3" name="fieldMark[correct00]"  class="css-checkbox"
        <?php echo ( in_array('G3',$booked) )? 'Checked' : '' ?>
        >
    <label data-on="G3" data-off="G3"></label> 
</span> 
</div>


</div>
 
</div>

    </form>
<div class="right1">
  <div >Seat Information:
  <form id="form1" name="form1" method="post" action="/bank/payment.php">

    <table width="368" border="1" style="border-color:#800000; background-color: #FF8080;">
      <tr style="background-color: #800000;">
        <td width="40" height="30"><div align="center">Seat No </div></td>
        <td width="60"><div align="center">Fare(Taka)</div></td>
        <td width="80"><div align="center">Submit</div></td>
      </tr>
      <tr>
        <td height="30" style="border-color:#800000;"><label>
          <input type="text"  name="seatno" id="seatno" class="input-checkout" />
        </label></td>
        <td style="border-color:#800000;"><label>
                <input name="coach-no" value="<?php echo $bus['fare'] ?>" id="fareValue" type="hidden"/>
          <input type="text" name="fare" id="fare" class="input-checkout"  />
        </label></td>
        <td style="border-color:#800000;"><label>

                <!--- All information for check out process -->
                <input name="coachid" type="hidden" value="<?php echo $_GET['busid']; ?>"/>
                <input name="from" type="hidden" value="<?php echo $_GET['from']; ?>"/>
                <input name="to" type="hidden" value="<?php echo $_GET['to']; ?>"/>
                <input name="date" type="hidden" value="<?php echo $booking_date; ?>"/>
                <input name="time" type="hidden" value="<?php echo $_GET['time'];; ?>"/>

          <input type="submit" class="btn-submit" name="Checkout" value="Check Out"  id="addForPayment"/>

        </label></td>
      </tr>
      <!--<tr  style="background-color: #800000;">
        <td height="30">&nbsp;</td>
        <td></td>
        <td>&nbsp;</td>
              
      </tr>-->
    </table>
        <div id="total"></div>
    </form>

  </div>
</div>
</div>




	  <div class="footer">

	<h1>&nbsp;</h1>
	<h1>&nbsp;</h1>
	<h1>User Skin &copy; All rights reserved.</h1>
	<h1> Privacy Policy | Terms & Conditions</h1>

</div>


<script src="js/jquery-2.1.3.min.js"></script>
<script>
    $(function()
    {
        var multipleSeatReservation = [];
        var fare = 0;
        $('input:checkbox[id^="booked_"]:checked').each(function(){
            $(this).attr('disabled',true);
        });
        RamainingSeat();

        $( 'input:checkbox[id^="booked_"]' ).change(function() {

            if(this.checked ==  true)
            {
                multipleSeatReservation.push($(this).val());
                //console.log(multipleSeatReservation);
                $('#seatno').val(multipleSeatReservation);

                fare = fare + parseInt($("#fareValue").val());
                $('#fare').val(fare + "");

                RamainingSeat();
            }
            else
            {
                if(multipleSeatReservation.length > 0 )
                {
                    // initialize index value of unchecked seat no
                    var index = multipleSeatReservation.indexOf($(this).val());

                    // if index value grater then 0
                    if (index > -1) {
                        // then remove seat no value from multipleSeatReservation array
                        // and returns new array of multipleSeatReservation
                        // The second parameter of splice is the number of elements to remove from multipleSeatReservation array
                        multipleSeatReservation.splice(index, 1);

                        // then initialize multipleSeatReservation array to seatno
                        $('#seatno').val(multipleSeatReservation);

                        // subtract seat no fare from total fare
                        fare = fare - parseInt($("#fareValue").val());

                        // then initialize total fare to fare textbox
                        $('#fare').val(fare + "");

                        // if multipleSeatReservation array is empty
                        // then initialize seatno and fare textbox to empty
                        if(multipleSeatReservation.length == 0 )
                        {
                            $('#seatno').val('');
                            $('#fare').val('');
                        }
                    }
                }
            }

        });
    });



    function RamainingSeat()
    {
        var booked = 0;
        $('input:checkbox[id^="booked_"]:checked').each(function(){
            booked = booked + 1;
        });

        $('#total').html("Total Seat Remaining: " + (28 - booked));
    }
</script>
<?php
if(isset($_SESSION['reportorder']))
 		{
 			echo '<script type="text/javascript">
				 	
				 	function report()
				 	{
				 		window.open("http://localhost/bus-ticket/Ticketreservation/user/order-pdf.php", "_blank");
				 	}
			 	 </script>';

			 	// unset($_SESSION['reportorder']);

 		}
?>
</body>
</html>

