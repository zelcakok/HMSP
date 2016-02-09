<?php
  function chkmet(){
	if ($_SERVER['REQUEST_METHOD'] != 'POST'){
		header("Location: http://www.google.com");
		exit();
	} else {
		return 0;
	}
  }
  function chkconn($conn){
	if ($conn->connect_error) {
		die('Could not connect: ' . $conn->connect_error);
	}
	return 0;
  }
  function login($conn,$username,$password){	
	$query = "Select * from staff where Username='" . $username . "' AND Password='" . $password . "';";
	$result = $conn->query($query);
	if ($result->num_rows <= 0){
		return 1;
	} else {			
		return 0;
	}	
  }
  function query_incident($conn){
	$query = "select count(i.ID),i.ID as IncidentID,
			  s.Firstname as Staff_Firstname,s.Lastname as Staff_Lastname,s.Profile_Path as Staff_Profile_Path,
			  p.Lastname as Patient_Lastname,p.Firstname as Patient_Firstname,p.Profile_Path as Patient_Profile_Path,
			  i.Categories,i.Status from incident i,staff s,patient p where i.StaffID=s.ID and i.PatientID=p.ID;";
	$result = $conn->query($query);
	$conn->close();
	return $result;
  }
  
?>