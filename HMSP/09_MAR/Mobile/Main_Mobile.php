<?php
session_start();
?>
<!doctype html>
<html>
<head>
<title>HMSP Web Console</title>
<meta name="viewport" content="width=device-width">
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="192x192" href="../images/HMSP_Logo.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.js" type="text/javascript"></script>
<script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	reset_content("#statistics");	
    $("#btnLogout").click(function(){		
	  $(location).attr("href","../lib/connect.php?act=logout");
	})
	$("#btnStat").click(function(){
		reset_content("#statistics");
	})
	$("#btnIncident_open").click(function(){
		reset_content("#incident_open");
	})
	$("#btnIncident_pending").click(function(){
		reset_content("#incident_pending");
	})
	$("#btnIncident_closed").click(function(){
		reset_content("#incident_closed");
	})
	$("#btnProfile").click(function(){
		reset_content("#profile");
	})	
	$("#statistics").load("records.php");
});
function reset_content($id){
	$(".content").hide();
	$($id).show();
}
</script>
<?php
function tmp(){
	echo "tmp";
}

?>
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true" style="padding-right:5px;"></span>HMSP Mobile</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" id="btnStat"><span class="glyphicon glyphicon-stats" aria-hidden="true" style="padding-right:5px;"></span>Statistics<span class="sr-only">(current)</span></a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="padding-right:5px;"></span>Incidnets<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="btnIncident_open"><span class="glyphicon glyphicon-flash" aria-hidden="true" style="padding-right:5px;"></span>OPEN</a></li>
            <li><a href="#" id="btnIncident_pending"><span class="glyphicon glyphicon-time" aria-hidden="true" style="padding-right:5px;"></span>PENDING</a></li>
            <li><a href="#" id="btnIncident_closed"><span class="glyphicon glyphicon-ok" aria-hidden="true" style="padding-right:5px;"></span>CLOSED</a></li>
            <!--
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
            -->
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <span class="glyphicon glyphicon-search" aria-hidden="true" style="padding-right:5px;"></span><input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right:5px;"></span><?php echo $_SESSION["Login_Username"]; ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" id="btnProfile"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="padding-right:5px;"></span>Edit Profile</a></li>
            <li class="divider"></li>
            <li><a href="#" id="btnLogout"><span class="glyphicon glyphicon-console" aria-hidden="true" style="padding-right:5px;"></span>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div class="content" id="statistics"></div>
<div class="content" id="incident_open">incident open<?php tmp(); ?></div>
<div class="content" id="incident_pending">incident pending</div>
<div class="content" id="incident_closed">incident closed</div>
<div class="content" id="profile">profile</div>
</html>
