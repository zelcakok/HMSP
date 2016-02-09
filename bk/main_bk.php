<html>
 <head>
 <?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		if ($_POST["username"] != "" && $_POST["password"] != ""){			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$conn = new mysqli("192.168.0.119", "hmsp_user", "P@ssw0rd", "hmsp");
			if ($conn->connect_error) {
				die('Could not connect: ' . $conn->connect_error);
			}			
			$sql = "SELECT * FROM staff WHERE username='$username' and password='$password'";
			$result = $conn->query($sql);
			
			
			if ($result->num_rows > 0){
				echo "INFO: Login successfully. Welcome " . $username;
			}else {
				echo "ERROR: Wrong username or password.";
			}
			$conn->close();
		}
	}
  ?>
  <meta charset="UTF-8">
  <title>HMSP Web Console</title>
 </head>
 <body> 
  <h1>Login successfully.</h1>
 </body>
</html>