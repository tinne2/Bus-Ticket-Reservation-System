form method="post" action="script.php">
<input type="checkbox" id="required-checkbox" name="agree" onclick="CheckIfChecked()"> Will is a good programmer!
<div id="submit-button-container" style="display:none;">
<input type="submit" value="Submit Button">
</div>
</form>

<noscript>
<p style="font-size:larger;"><b>JavaScript is required to use this form.</b></p>
</noscript>

<script type="text/javascript"><!--
function CheckIfChecked()
{
   var CheckboxID = "required-checkbox";
   var SubmitButtonContainerID = "submit-button-container";
   if( document.getElementById(CheckboxID).checked ) { document.getElementById(SubmitButtonContainerID).style.display = "block"; }
   else { document.getElementById(SubmitButtonContainerID).style.display = "none"; }
}
CheckIfChecked();
//-->
</script>
