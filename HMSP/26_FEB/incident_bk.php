<?php
  session_start();
  function show_incident($index){	  	
	include_once("lib/connect.php");
	$result = query_incident($index);
	if ($result->num_rows>0){
		while ($row=$result->fetch_assoc()){
			$Patient_Data=array($row["Patient_Profile_Path"],
								$row["Patient_Lastname"],
								$row["Patient_Firstname"],
								$row["Patient_Categories"],
								$row["Patient_Available"]);	
								
			$Incident_Data=array($row["Description"],
								 $row["Categories"],
								 $row["Status"],
								 $row["OPEN_TIME"],
								 $row["Incident_ID"]);			
			echo "<span style='width:auto; float:left; padding-right: 10px; padding-top:10px;'>";
			Alter_table("template/raw_incident_table.php",$Patient_Data,$Incident_Data); //Deleted input $Staff_Data
			echo "</span>";
			$_SESSION["total_Incident"]+=1;
			unset($Patient_Data);
			unset($Incident_Data);
		}
	} else {
		echo "INFO: No records";
	}		
  }
  
  function Alter_table($path,$Patient_Data,$Incident_Data){ //Deleted input $Staff_Data
	$NewFileName=$_SESSION["Login_Username"] . "_" . $Incident_Data[4] . "_" . "copied_incident_table.php";
	array_map('unlink', glob("*copied_incident_table.php"));
	$fhandle = fopen($path,"r");
	$content = fread($fhandle,filesize($path));	  	
	$content = str_replace("//Patient_Profile_Path", $Patient_Data[0], $content);
	$content = str_replace("//Patient_Lastname", $Patient_Data[1], $content);
	$content = str_replace("//Patient_Firstname", $Patient_Data[2], $content);
	$content = str_replace("//Patient_Cate", $Patient_Data[3], $content);
	if ($Patient_Data[4]==1) $content = str_replace("//Patient_Avail", "Yes", $content);
	if ($Patient_Data[4]==0) $content = str_replace("//Patient_Avail", "No", $content);
	
	$content = str_replace("//Description", trim($Incident_Data[0],""), $content);
	$content = str_replace("//Categories", $Incident_Data[1], $content);
	$content = str_replace("//Status", $Incident_Data[2], $content);
	$content = str_replace("//OPEN_TIME", $Incident_Data[3], $content);



  	copy($path,$NewFileName); 	
	$fhandle = fopen($NewFileName,"w");
	fwrite($fhandle,$content);
	fclose($fhandle);
	
	
	$myfile = fopen($NewFileName, "r") or die("Unable to open file!");
	while(!feof($myfile)) {
  		echo fgets($myfile);
	}
	fclose($myfile);
	unlink($NewFileName);
	
  }
?>