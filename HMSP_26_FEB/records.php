<?php
session_start();
include("lib/chartphp_dist.php"); 
  $p = new chartphp();
  $p->data = array(
			  array(
				  array("OPEN",$_SESSION["Num_Incident"][0]),
				  array("PENDING",$_SESSION["Num_Incident"][1]),
				  array("CLOSED",$_SESSION["Num_Incident"][2])				  
			  )
		  );
  $p->chart_type = "bar";
  // Common Options
  $p->title = "Incident records";
  $p->xlabel = "Status";
  $p->ylabel = "# of Incident";
  $p->export = false;
  $p->options["legend"]["show"] = true;
  $p->series_label = array('Q1','Q2','Q3'); 
  $out = $p->render('c1');
?>
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/chartphp.js"></script>
<link rel="stylesheet" href="css/chartphp.css">
<div style="width:40%; min-width:450px;">
		<?php echo $out; ?>
</div>
