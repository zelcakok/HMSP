<?php
session_start()
?>
<!doctype html>
<html>
<head>
<script src="js/bootstrap-3.3.4.js" type="text/javascript"></script>
<script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>


<script type="text/javascript">
function logout(){	
   window.location.replace("clear_session.php");
}
</script>
<script>
$(document).ready(function() {
    $("#btnLogout").click(function(){
		//$(location).attr("href","clear_session.php");
		$(location).attr("href","lib/connect.php?act=logout");
	})	
	$('#chart').load("records.php");
});
</script>
<style>
<!--CSS-->
</style>
<?php
	//Place php code here.	 
	include_once("lib/connect.php");
	if ($_SESSION["Login_Username"]=="") { header("Location: index.php");}	
	//$conn=get_conn($_SESSION["Login_Username"],$_SESSION["Login_Password"]);
	$Incident_Tab_index=1;	
 ?>
<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> --><!-- <script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script> -->
<link href="css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HMSP Web Console</title>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/anonymous-pro:n4:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="padding-top: 70px">
<header>
  <table width="90%" border="0" align="center">
    <tbody>
      <tr>
        <td height="44" colspan="2">&nbsp;</td>
        <td width="50%" rowspan="2"><img src="images/Sunnysidelogo.png" alt="" width="329" height="92" align="right"/></td>
      </tr>
      <tr>
        <td width="5%"><img src="images/HMSP_Logo.png" width="49" height="48" alt=""/></td>
        <td width="45%"><span style="text-align: center; font-family: anonymous-pro; font-style: normal; font-size: 24px;">HMSP Web Console</span></td>
      </tr>
    </tbody>
  </table>
  <hr>
  <main>
    <table width="100%" height="453" border="0" align="center">
      <tbody>
        <tr>
          <td height="33"></td>
          <td width="*" valign="top"><span style="font-family:anonymous-pro; font-size:18px;">Monitoring Panel</span></td>                    
        </tr>
        <tr>
          <td width="66"></td>
          <td colspan="2" valign="top">
          <!--Content here-->
          <div id="Tabs1">
            <div role="tabpanel">
              <ul class="nav nav-pills" role="tablist">
                <li></li>
                <li></li>
                <li class="active"><a href="#paneTwo1" data-toggle="tab" role="tab"><span class="glyphicon glyphicon-stats" aria-hidden="true" style="padding-right:5px;"></span>Statistics</a></li>
                <li class="dropdown"><a href="#" id="tabDropOne1" class="dropdown-toggle" data-toggle="dropdown" role="tab"><span class="glyphicon glyphicon-briefcase" aria-hidden="true" style="padding-right:5px;"></span>Incidents<?php echo "&nbsp;<span class='badge'>NEW</span>"; ?><b class="caret"></b></a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="tabDropOne1">
                  <?php
				  	
				  	
					$result = query_status();
					if ($result -> num_rows > 0){
						while ($row=$result->fetch_assoc()){			
							switch ($Incident_Tab_index){
							case 1:
								$icon='flash';	
								break;
							case 2:
								$icon='time';
								break;
							case 3:
								$icon='ok';
								break;							
							}
							echo "<li><a href='#tabDropDownOne" . $Incident_Tab_index . "' tabindex='-1' data-toggle='tab'><span class='glyphicon glyphicon-" . $icon . "' aria-hidden='true' style='padding-right:5px;'></span>" . $row["Status"] . "&nbsp;<span class='badge'>" . $_SESSION["Num_Incident"][$Incident_Tab_index-1] . "</span></a></li>";
							$Incident_Tab_index+=1;
							/*
							1 -> OPEN
							2 -> PENDING
							3 -> CLOSED
							*/
						}
					}
				  ?>
                  </ul>
                </li>
                <?php
				if ($_SESSION["Login_Username"]=="root"){
 		            echo "<li><a href='#paneTwo2' data-toggle='tab' role='tab'><span class='glyphicon glyphicon-wrench' aria-hidden='true' style='padding-right:5px;'></span>Patients administration</a></li>";
	                echo "<li><a href='#paneTwo3' data-toggle='tab' role='tab'><span class='glyphicon glyphicon-wrench' aria-hidden='true' style='padding-right:5px;'></span>Staff administration</a></li>";
				} else {
					echo "<li><a href='#paneTwo2' data-toggle='tab' role='tab'><span class='glyphicon glyphicon-list' aria-hidden='true' style='padding-right:5px;'></span>Patients list</a></li>";	                	
				}
				?>
                <li class="dropdown pull-right" style="padding-right:10px;"><a href="#paneProfile" data-toggle="dropdown" role="tab">
                <span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right:1px;"></span>
				<?php echo $_SESSION["Login_Username"]; ?><b class="caret"></b></a>
                	<ul class="dropdown-menu" role="menu" aria-labelledby="tabDropProfile">
                    	<li><a href="#tabDropProfile" data-toggle='tab' role='tab'>
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="padding-right:5px;"></span>Edit profile</a></li>
                    	<li><a href="#tabDropLogout" id="btnLogout">
                        <span class="glyphicon glyphicon-console" aria-hidden="true" style="padding-right:5px;"></span>Logout</a></li>
                   	</ul>
                </li>                
              </ul>    
                        
              <div id="tabContent1" class="tab-content">             
                <div class="tab-pane fade in active " id="paneTwo1">					                    
                	<!--<p>Content of statistics</p>-->
                    <p id="chart"></p>                                        
                </div>                
                <div class="tab-pane fade" id="paneTwo2">
                  <?php 
				  if ($_SESSION["Login_Username"]=="root") echo "<p>Content of patient administration</p>"; 
				  else echo "<p>Content of patients</p>"; 
				  ?>
                </div>
                <div class="tab-pane fade" id="paneTwo3">
	              <?php 
				  if ($_SESSION["Login_Username"]=="root") echo "<p>Content of staff administration</p>"; 
				  else echo "<p>Content of profile</p>"; 
				  ?>                  
                </div>
                <div class="tab-pane fade" id="tabDropProfile">
	              <p>hi</p>
                </div>

                <?php								
				include_once("incident.php");			
				  for ($i=0; $i<=$Incident_Tab_index-1 ; $i++){
					  echo "<div class='tab-pane fade' id='tabDropDownOne" . $i ."'>";					  				
					  show_incident($i);				
					  echo "</div>";
				  }				  
				?>                

                <!--
                <div class="tab-pane fade" id="tabDropDownOne1">
                  <p>Dropdown content#1</p>
                </div>
                <div class="tab-pane fade" id="tabDropDownTwo1">
                  <p>Dropdown content#2 </p>
                </div>
                <div class="tab-pane fade" id="tabDropDownThree1">
                  <p>Dropdown content#3 </p>
                </div>
                -->
              </div>
            </div>
            <!--Content end here-->
          </td>          
        </tr>
      </tbody>
    </table>
  </main>
</header>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>