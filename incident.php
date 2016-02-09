<!doctype html>
<html>
<head>
<style>
.profile {
	width: auto;
	max-height: 120px;
}
.incident {
	width:auto;
	max-height:100px;
}

</style>
<meta charset="UTF-8">
<title>Incident</title>
</head>
<body>
<?php
	include_once("connect.php");
	$conn=new mysqli("localhost", "root", "P@ssw0rd","hmsp");
	$result=query_incident($conn);
	if ($result->num_rows>0){
	  while($row = $result->fetch_assoc()) {
		  incident_table($row);
	  }
	}
	function incident_table($row){ //Incident will popup when the specific icon was clicked. 
	  echo "<table align='left' border='1' width='70%' style='text-align:center'>";
		echo "<tr><td width='10%'>IncidentID</td><td width='75%'></td><td width='5%'></td><td width='10%'>Status</td></tr>";
		echo "<tr>";
			echo "<td>" . $row["IncidentID"] . "</td>" . "<td></td><td></td><td>" . $row["Status"] . "</td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Staff</td><td>" . $row["Staff_Firstname"] . "</td><td>" . $row["Staff_Lastname"] . "</td><td><img class='profile' src=" . $row["Staff_Profile_Path"] . "></td>";
		echo "</tr>";
		echo "<tr>";
			echo "<td>Patient</td><td>" . $row["Patient_Firstname"] . "</td><td>" . $row["Patient_Lastname"] . "</td><td><img class='profile' src=" . $row["Patient_Profile_Path"] . "></td>";
		echo "</tr>";
	  echo "</table>";
	  echo "<p>&nbsp;</p>";
	}
?>
</body>
</html>
