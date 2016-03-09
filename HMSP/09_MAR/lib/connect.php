<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	manageLogin();	
}
if ($_GET["act"]=="logout"){
	logout();	
}
?>
<?php
 
  function get_conn(){
	$conn = new mysqli("localhost", "hmsp", "P@ssw0rd","hmsp");
	$query = "SET SESSION time_zone = '+8:00')";  
	$result = $conn->query($query);		
	return $conn;
  }
  

  
  function query_status(){
	$conn = get_conn();
	$query = "SELECT Status FROM incident GROUP BY Status ORDER BY FIELD(Status,'OPEN','PENDING','CLOSED')";  
	$result = $conn->query($query);	
	$conn->close();	
	return $result;
  }
  
  function query_categories(){
	$conn = get_conn();
	$query = "SELECT
		Categories 
	FROM incident
	GROUP BY Categories;";  
	$result = $conn->query($query);
	$conn->close();
	return $result;
  }
  
   function query_num_incident(){
	$conn = get_conn();
	$query = "select Status,count(*) as num from incident Group by status order by field(Status,'OPEN','PENDING','CLOSED');";
	$result = $conn->query($query);	
	$conn->close();
	return $result; 	 
  }
  
  function chklogin($username,$password){
	$conn = get_conn();
	$query = "Select * from staff where Username='" . $username . "' AND Password='" . $password . "';";	
	$result = $conn->query($query);
	if ($result->num_rows <= 0){
		return 1;
	} else {			
		return 0;
	}	  
  }
  
  function get_num_incident($result){
	$conn = get_conn();
	$total_incident=0;
	$num_incident=array(0,0,0,0);
	while ($row=$result->fetch_assoc()){
		if ($row["Status"]=="OPEN")	$num_incident[0] = $row["num"];
		else if ($row["Status"]=="PENDING")	$num_incident[1] = $row["num"];
		else if ($row["Status"]=="CLOSED")	$num_incident[2] = $row["num"];		
		$total_incident+=$row["num"];
	  /*
	  0 -> OPEN
	  1 -> PENDING
	  2 -> CLOSED
	  3 -> Total_Incidnet
	  */
	}	
	$num_incident[3] = $total_incident;	
  	return $num_incident;
  }
  
 
  function query_incident($index){	  	
  $conn = get_conn();
	switch ($index){
		case 1:
			$status="'OPEN'";
			break;
		case 2:
			$status="'PENDING'";
			break;
		case 3:
			$status="'CLOSED'";
			break;
	}			
	
	$query = "SELECT 
	  i.ID as Incident_ID,	  
	  p.Lastname as Patient_Lastname,p.Firstname as Patient_Firstname,p.Profile_Path as Patient_Profile_Path,
	  p.Categories as Patient_Categories, p.Available as Patient_Available,
	  i.Categories as Categories,i.Status as Status, i.Description as Description, i.OPEN_TIME as OPEN_TIME
	FROM incident i,staff s,patient p
	WHERE i.PatientID=p.ID AND i.Status=" . $status . "
	GROUP BY i.ID;";
	//echo $query;
	$result = $conn->query($query);	
	$conn->close();
	return $result;
  }
  
  function manageLogin(){
	if (chklogin($_POST["username"],$_POST["password"])==0) {		  
		  $_SESSION["Num_Incident"] = get_num_incident(query_num_incident());
		  $_SESSION["Login_Username"] = $_POST["username"];
		  $_SESSION["Login_Password"] = $_POST["password"];	      
		  header("Location: ../index.php");	  		 
		  $conn->close();
	  } else {
		  session_unset();
		  session_destroy();
		  header("Location: ../index.php?msg=System: Login failure.");
		  $conn->close();
		  exit();
	  }
  }
  function chkclient(){
	include 'Mobile_Detect.php';
  	$detect = new Mobile_Detect();
  	if ($detect->isMobile()){
  		return "Mobile";
  	} else {
  		return "Desktop";
  	}
  }
  function logout(){
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
  }
?>