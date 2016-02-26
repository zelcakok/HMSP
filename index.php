<?php
session_start();
include_once("lib/connect.php");
if (isset($_SESSION["Login_Username"])){	
	if (chkclient()=="Mobile"){
	 	header("Location: Mobile/Main_Mobile.php");
	} else {
		header("Location: Main.php");
	}
} else {
	if (chkclient()=="Mobile"){
		 if (isset($_GET["msg"])) header("Location: Mobile/Login_Mobile.php?msg=" . $_GET["msg"]);
		 else header("Location: Mobile/Login_Mobile.php");
	} else {
		if (isset($_GET["msg"])) header("Location: Login.php?msg=" . $_GET["msg"]);
		else header("Location: Login.php");
	}
}
?>