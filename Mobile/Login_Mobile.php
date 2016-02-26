<!doctype html>
<html>
<head>
<title>HMSP Web Console</title>
<meta name="viewport" content="width=device-width">
<meta name="mobile-web-app-capable" content="yes">
<link rel="icon" sizes="192x192" href="../images/HMSP_Logo.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="../css/bootstrap-3.3.4.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="../js/bootstrap-3.3.4.js" type="text/javascript"></script>
<script src="../js/jquery-1.12.0.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){	
	$("#btnlogin").click(function(){
		$("#btnstat").parent().removeClass("active");
		var $parent = $(this).parent();
		if (!$parent.hasClass("active")) $parent.addClass("active");
		$(".content").hide();
		$("#login").show();
	})
});
</script>
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
<div class="content" id="login">
  <div style="font-family: anonymous-pro; font-style: normal; font-weight: 400; font-size: 15px;">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>-->
          <a class="navbar-brand" href="#">HMSP Mobile</a></div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="defaultNavbar1">          
          <ul class="nav navbar-nav navbar-right">
	          <li><a href="#"><span class="glyphicon glyphicon-console" aria-hidden="true" style="padding-right:5px;"></span>Login</a></li>            
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </div>
  <center><img src="../images/HMSP_Logo.png" alt="Placeholder image" width="195" height="194" class="img-responsive"></center>
  <p>&nbsp;</p>
  <table align="center" border="0" width="80%">
    <tr>
      <td width="94%" align="left" style="font-family: anonymous-pro; font-style: normal; font-weight: 400; font-size: 18px;">Credenitals</td>
    </tr>
    <tr>
      <td width="94%" align="left" colspan="2">     
    <form action="../connect.php" method="POST" role="form">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username">
        </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
        </div>
    <button type="submit" class="btn btn-default" style="float:right;">Submit</button>
    <pre style="vertical-align:middle; color:red; clear:left; width:auto; height:auto; border:none; background-color:transparent;"><?php echo $_GET["msg"]; ?></pre>
    </form>
  </td>
  </tr>
  </table>  
</div>
</html>