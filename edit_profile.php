<?php
session_start();
include_once("lib/connect.php");
function show_data(){
	//$conn = get_conn($_SESSION["Login_Username"],$_SESSION["Login_Password"]);
	//Alter_table("raw_edit_profile.php",$_SESSION["Profile_Path"]);
}
function Alter_table($path,$data){ //Deleted input $Staff_Data
	$NewFileName=$_SESSION["Login_Username"] . "_" . "copied_edit_profile.php";
	array_map('unlink', glob("*copied_edit_profile.php"));
	$fhandle = fopen($path,"r");
	$content = fread($fhandle,filesize($path));	 
	 	
	$content = str_replace("\\Profile_Path", $data, $content);



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