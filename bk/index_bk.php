<!DOCTYPE html>
<html>
 <head>
  <style>
  .layout {
    float: middle;
    margin: 5px;
    padding: 15px;    
    border: 0px;
	width: auto;
	zoom: 130%;
  } 
  input{
	  text-align:center;
  }
  </style>
  <meta charset="UTF-8">
  <title>HMSP Web Console</title>
 </head>
 <body> 
  <form class="layout" action="main.php" method="POST">
    <table align="center" border="0" width="100%">
	  <tr>
	   <td colspan="3" align="center"><img src="LoginIcon.png"></td>
	  </tr>
	  
      <tr>
       <td colspan="3" align="center"><h2>HMSP Web Console</h2></td>
	  </tr>
	<tr>
	<td width="70%">
	<table border="0" width="100%" align="right">
		<tr>	  
			<td align="right" width="50%">Username:</td>
			<td align="left" width="50%"><input type="text" id="username" name="username" size="26"></td>			
		</tr>
		 
		<tr>
			<td align="right" width="50%">Password:</td>
			<td align="left" width="50%"><input type="password" id="password" size="26" name="password"></td>
		</tr>
		
	</table>
	</td>
	<td rowspan="2" align="left" width="30%"><input type="submit" name="submit" value="Login"></td>
	</tr>   
    </table>
  </form>
 </body>
</html>
   