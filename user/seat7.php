

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/style4.css" rel="stylesheet" type="text/css" />

 <meta charset="utf-8">
        <title>Multiple checkbox calculation</title>
        <style>
            div {
                color: red;
                font-size: 15px;/*35px;*/
            }
        </style>
        <script src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {


                $("input[type=checkbox]").click(function() {
                    var total = 0;
                    $("input[type=checkbox]:checked").each(

                    function() {
				
                        total += parseInt($(this).val());

                    });
                    
                    $("#total").html("total:" + total);
                });

            });
        </script>
		<!--<script type="text/javascript">
$(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                alert("Checkbox is checked.");
            }
            else if($(this).is(":not(:checked)")){
                alert("Checkbox is unchecked.");
            }
        });
    });
</script>-->



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
  <form id="form1" name="form1" method="post" action=""  >
  

<div class="var4-bg">

<div class="content">

<div class="left1">
<div class="leftw">
<div align="center">Driver</div>
</div>
<div class="leftbg">
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field1"  class="css-checkbox" > 
    <label  data-on="A1" data-off="A1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field2"  class="css-checkbox" > 
    <label data-on="B1" data-off="B1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field3"  class="css-checkbox" > 
    <label data-on="C1" data-off="C1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field4"  class="css-checkbox" > 
    <label data-on="D1" data-off="D1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field5"  class="css-checkbox" > 
    <label data-on="E1" data-off="E1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field6"  class="css-checkbox" > 
    <label data-on="F1" data-off="F1"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field7"  class="css-checkbox"> 
    <label data-on="G1" data-off="G1"></label> 
</span> 
</div>
</div>

<div class="leftbg">
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field8"  class="css-checkbox"> 
    <label data-on="A2" data-off="A2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field9"  class="css-checkbox"> 
    <label data-on="B2" data-off="B2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field10"  class="css-checkbox"> 
    <label data-on="C2" data-off="C2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field11"  class="css-checkbox"> 
    <label data-on="D2" data-off="D2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field12"  class="css-checkbox"> 
    <label data-on="E2" data-off="E2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field13"  class="css-checkbox"> 
    <label data-on="F2" data-off="F2"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field14"  class="css-checkbox"> 
    <label data-on="G2" data-off="G2"></label> 
</span> 
</div>

</div>
 <div class="leftbg3">
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field15"  class="css-checkbox"> 
    <label data-on="A4" data-off="A4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field16"  class="css-checkbox"> 
    <label data-on="B4" data-off="B4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field17"  class="css-checkbox"> 
    <label data-on="C4" data-off="C4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field18"  class="css-checkbox"> 
    <label data-on="D4" data-off="D4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field19"  class="css-checkbox"> 
    <label data-on="E4" data-off="E4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field20"  class="css-checkbox"> 
    <label data-on="F4" data-off="F4"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field21"  class="css-checkbox"> 
    <label data-on="G4" data-off="G4"></label> 
</span> 
</div>
</div>

<div class="leftbg3">
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field22"  class="css-checkbox"> 
    <label data-on="A3" data-off="A3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field23"  class="css-checkbox"> 
    <label data-on="B3" data-off="B3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field24"  class="css-checkbox"> 
    <label data-on="C3" data-off="C3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field25"  class="css-checkbox"> 
    <label data-on="D3" data-off="D3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field26"  class="css-checkbox"> 
    <label data-on="E3" data-off="E3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field27"  class="css-checkbox"> 
    <label data-on="F3" data-off="F3"></label> 
</span> 
</div>
<div> 
<span class="checkbox"> 
    <input type="checkbox" value="1" name="field28"  class="css-checkbox"> 
    <label data-on="G3" data-off="G3"></label> 
</span> 
</div>

</div>
 
</div>

    </form>
<div class="right1">
  <div align="center">Seat Information:
  <form id="form1" name="form1" method="post" action="payment.php">

    <table width="368" border="1" style="border-color:#800000; background-color: #FF8080;">
      <tr style="background-color: #800000;">
        <td width="40" height="30"><div align="center">Seat No </div></td>
        <td width="60"><div align="center">Fare(Taka)</div></td>
        <td width="80"><div align="center">Submit</div></td>
      </tr>
      <tr>
        <td height="30" style="border-color:#800000;"><label>
          <input type="text"  name="seatno"/>
        </label></td>
        <td style="border-color:#800000;"><label>
          <input type="text" name="fare" />
        </label></td>
        <td style="border-color:#800000;"><label>

          <input type="submit" name="Submit" value="Submit" /> 

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

	  <div class="footer">

	<h1>&nbsp;</h1>
	<h1>&nbsp;</h1>
	<h1>User Skin &copy; All rights reserved.</h1>
	<h1> Privacy Policy | Terms & Conditions</h1>

</div>

</body>
</html>
