<?php
	include_once("connect.php");

    /*** include the xajax bootstrap ***/
    include 'xajax/xajax_core/xajax.inc.php';

    /*** a new xajax object ***/
    $xajax = new xajax();

    /*** register a PHP function with xajax ***/
    $xajax->register(XAJAX_FUNCTION, 'showText');

    /*** process the request ***/
    $xajax->processRequest();


    function showText()
    {
        /*** the content to assign to the target div ***/
        $content = get_num();

        /*** a new response object ***/
        $objResponse = new xajaxResponse();

        /*** assign the innerHTML attribute to the new $content ***/
        $objResponse->assign("my_div","innerHTML", $content);
		
		$objResponse->call('setTimeout','xajax_showText();','15000');

        /*** return the object response ***/
        return $objResponse;
    }
	function get_num(){	
	  $conn=get_conn("TH_K","P@ssw0rd");
	  $num_incident=get_num_incident($conn,query_num_incident($conn));
	  return $num_incident[0];
	}
	
	function get_num_incident($conn,$result){
		$total_incident=0;
		$num_incident=array(0,0,0,0);
		while ($row=$result->fetch_assoc()){
			if ($row["Status"]=="OPEN")	$num_incident[0] = $row["num"];
			else if ($row["Status"]=="PENDING")	$num_incident[1] = $row["num"];
			else if ($row["Status"]=="CLOSED")	$num_incident[2] = $row["num"];		
			$total_incident+=$row["num"];
		  /*
		  0 -> OPEN
		  1 -> PENDING
		  2 -> CLOSED
		  3 -> Total_Incidnet
		  */
		}	
		$num_incident[3] = $total_incident;	
		return $num_incident;
	 }
	  
    /*** process the request ***/
    $xajax->processRequest();

    /*** the path is relative to the web root mmmk ***/
    $xajax_js = $xajax->getJavascript('xajax');
?>

<!DOCTYPE HTML>
<html>

<head>

<title>PHPRO.ORG</title>
<?php echo $xajax_js; ?>
</head>

<body>
<script src="js/jquery-1.12.0.min.js"></script>
<script>
$(document).ready(function(e) {
    xajax_showText();
});
</script>
<div id="my_div">New text will happen here</div>
</body>

</html>