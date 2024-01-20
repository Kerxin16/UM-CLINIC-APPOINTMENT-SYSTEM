<?php

$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
session_start();
$email=$_SESSION['email'];
$Clinic_Appointment_Speciality=$_SESSION['Clinic_Appointment_Speciality'];
$Clinic_Appointment_Date=$_SESSION['Clinic_Appointment_Date'];
$Clinic_Appointment_Time=$_SESSION['Clinic_Appointment_Time'];


/*retrive patient info */
$query = "SELECT * FROM um_community WHERE (UM_Community_Email= '$email') ";
$run = mysqli_query($conn,$query);  
$result = mysqli_fetch_assoc($run);

$Clinic_Appointment_Case_Type = filter_input(INPUT_POST, 'Clinic_Appointment_Case_Type');
$Clinic_Appointment_Reason_Of_Appointment = filter_input(INPUT_POST, 'Clinic_Appointment_Reason_Of_Appointment');
$Clinic_Doctor_Chosen = filter_input(INPUT_POST, 'doctor');

if($Clinic_Doctor_Chosen==""){
   $Clinic_Doctor_Chosen="-";
}
/*Today Date */
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate=date("Y-m-d"); 


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{

$sql = "UPDATE clinic_appointment SET  Clinic_Appointment_Case_Type=('$Clinic_Appointment_Case_Type'),
Clinic_Appointment_Reason_Of_Appointment=('$Clinic_Appointment_Reason_Of_Appointment'),Clinic_Appointment_Selected_Doctor=('$Clinic_Doctor_Chosen')
WHERE Clinic_Appointment_Speciality= '$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date='$Clinic_Appointment_Date'AND Clinic_Appointment_Time='$Clinic_Appointment_Time'
AND Clinic_Appointment_Email='$email'";

if ($conn->query($sql)){
   unset($Clinic_Appointment_Speciality);
   unset($Clinic_Appointment_Date);
   unset($Clinic_Appointment_Time);
   echo("<script> alert('Appointment Application Submitted Successfully.'); window.location.href='(CA) Patient_Clinic_Appointment1.php'; </script>"); 
}
else{

echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}




?>
