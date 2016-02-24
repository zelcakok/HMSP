<?php
include 'xajax/xajax_core/xajax.inc.php';
$xajax = new xajax();
$xajax->register(XAJAX_FUNCTION, 'update_num_incident'); //function name = xajax_(showText)
$xajax->processRequest();
function sending_data(){
	$content = "HI";
	$objResponse = new xajaxResponse();       
	$objResponse->assign($eleID,"innerHTML", $content);		//(output) element with id="output"
	$objResponse->call('setTimeout',$xaja_funcName,'15000');       //Timeout
	return $objResponse;
  }; 
$xajax->processRequest();
$xajax_js = $xajax->getJavascript('xajax');
?>





<?php
/*
Add this line to the php file -> <?php echo $xajax_js; ?>

Add this jquery code to call the xajax function when the web page is loaded.

<script>
$(document).ready(function(e) {
    xajax_showText();  // showText() function name
});
</script>
*/
?>