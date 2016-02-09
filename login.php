<?php
include_once("connect.php");
$conn = new mysqli("localhost", "root", "P@ssw0rd","hmsp");
if (chkmet()==0 && chkconn($conn)==0){
	$login_result = login($conn,$_POST["username"],$_POST["password"]);
	if ($login_result==0) {
		header("Location: http://192.168.0.171/hmsp/main.php");
		$conn->close();
	} else {
		header("Location: http://192.168.0.171/hmsp");
		$conn->close();
		exit();
	}
}
?>