<!doctype html>
<html>
<head>
<?php include_once("test.php");?>
<script src="js/jquery-1.12.0.min.js"></script>
<script>
$(document).ready(function(e) {
	setInterval(function(){
	if (localStorage.getItem("num") === null) $("#output").html("No value");
    else $("#output").html(localStorage.num);
	},500);
	
});
$("#btnClear").click(function(){
		localStorage.clear();
	})
</script>
<body>
<button id="btnClear">Clear</button>
<div id="output"></div>
</body>
</head>