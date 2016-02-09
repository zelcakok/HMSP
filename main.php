<!doctype html>
<html>
<head>
<style>
<!--CSS-->
.popup-windows{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index:1001;
        -moz-opacity: 0.8;
        opacity:.80;
        filter: alpha(opacity=80);
    }
}
</style>
<?php
	function popup(){
		echo "<div class='popup-windows'>";
		echo "<pre> Hi there sdfasd asdf </pre>";
		echo "</div>";		
	}
 ?>
<meta charset="utf-8">
<title>HMSP Web Console</title>
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/anonymous-pro:n4:default.js" type="text/javascript"></script>
</head>

<body>
<header>
  <table width="90%" border="0" align="center">
    <tbody>
      <tr>
        <td width="50%" height="44">&nbsp;</td>
        <td width="50%" rowspan="2"><img src="LoginIcon.png" alt="" width="auto" height="auto" align="right"/></td>
      </tr>
      <tr>
        <td><span style="text-align: center; font-family: anonymous-pro; font-style: normal; font-size: 24px;">HMSP Web Console</span></td>
      </tr>
    </tbody>
  </table>
  <hr>
  <main>
    <table width="100%" height="498" border="0" align="center">
      <tbody>
        <tr>
          <td width="5%">&nbsp;</td>
          <td width="85%" height="28"><h3 style="font-family: anonymous-pro; font-style: normal; font-weight: 400;">Monitoring Panel<span style="font-family: anonymous-pro;font-style: normal;font-weight: 400;"></span></h3></td>
          <td width="10%">&nbsp;</td>
        </tr>
        <tr>
          <td></td>
          <td colspan="2" style="text-align: center" valign="top">
          	<?php popup();?>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
</header>
</body>
</html>
