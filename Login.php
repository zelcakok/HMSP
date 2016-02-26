<!DOCTYPE html>
<html>
<head>
<?php
session_start();
session_unset();
session_destroy();
?>
<script src="js/jquery-1.12.0.min.js"></script>
<script>
$(document).ready(function(e) {
	$("#errmsg").hide();
	if (window.location.href.indexOf("msg")>-1){
		$("#errmsg").fadeIn(1600);
	}
	setTimeout(function(){$("#errmsg").fadeOut(1500)},5000);
	
});
</script>
  <style>
  .inputfield {
	text-align: center;
	white-space: nowrap;
	width:100%;
}
  .inputbtn {
	text-align: center;
	vertical-align: middle;
	white-space: nowrap;
	height: 100%;
	width: 100%;
}
  </style>
  <meta charset="UTF-8">
  <title>HMSP Web Console</title>
 <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
 <script>var __adobewebfontsappname__="dreamweaver"</script>
 <script src="http://use.edgefonts.net/anonymous-pro:n4,n7:default.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
  <table width="90%" border="0" align="center">
    <tbody>
      <tr>
        <td width="50%" height="44">&nbsp;</td>
        <td width="50%" rowspan="2"><img src="images/Sunnysidelogo.png" alt="" width="388" height="92" align="right"/></td>
      </tr>
      <tr>
        <td><span style="text-align: center; font-family: anonymous-pro; font-style: normal; font-size: 24px;">HMSP Web Console</span></td>
      </tr>
    </tbody>
  </table>  
</header>
<hr>
<div width="auto" height="auto"><center>
  <p><img src="images/HMSP_Logo.png" width="293" height="290" alt=""/></p>
</center>
</div>
<div>
<form class="layout" action="lib/connect.php" method="POST">
  <p>&nbsp;</p>
  <table width="24%" border="0" align="center">
    <tbody>
      <tr>
        <td colspan="4" style="text-align: left; font-family: anonymous-pro;"> Credentials</td>
        </tr>
      <tr>
        <td width="19%" style="text-align: right; font-family: anonymous-pro;">Username:</td>
        <td width="58%"><input name="username" type="text" class="inputfield" id="username" autofocus></td>
        <td width="2%" rowspan="2">&nbsp;</td>
        <td width="21%" rowspan="2"><input name="submit" type="submit" class="inputbtn" id="submit" value="Login" tabindex="1"></td>
        </tr>
      <tr>
        <td style="text-align: right; font-family: anonymous-pro;">Password:</td>
        <td><input name="password" type="password" class="inputfield" id="password" tabindex="0"></td>
        </tr>     
    </tbody>
  </table>
  </form>
  <pre id="errmsg" style="text-align:center; vertical-align:middle; color:red; clear:left; width:auto; height:auto; border:none; background-color:transparent;"><?php echo $_GET["msg"]; ?></pre>
</div>
</body>
</html>