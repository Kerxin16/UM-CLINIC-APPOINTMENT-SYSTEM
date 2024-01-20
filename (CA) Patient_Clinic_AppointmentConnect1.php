<?php

$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
session_start();
$email=$_SESSION['email'];

/*retrive patient info */
$query = "SELECT * FROM um_community WHERE (UM_Community_Email= '$email') ";
$run = mysqli_query($conn,$query);  
$result = mysqli_fetch_assoc($run);

$Clinic_Appointment_Name = $result['UM_Community_FullName'];
$Clinic_Appointment_Email = $email;
$Clinic_Appointment_Phone = $result['UM_Community_Phone'];
$Clinic_Appointment_Identity_Credential = $result['UM_Community_IC'];
$Patient_Gender= $result['UM_Community_Gender'];
$Patient_Birthdate= $result['UM_Community_Birthdate'];


$Clinic_Appointment_Speciality = filter_input(INPUT_POST, 'Clinic_Appointment_Speciality');
$Clinic_Appointment_Date = filter_input(INPUT_POST, 'Clinic_Appointment_Date');
$SelectedTimeSlot = filter_input(INPUT_POST, 'selectedTimeSlots');


/*Today Date */
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate=date("Y-m-d"); 
$appointmentAvailableDate = date("Y-m-d", strtotime($todayDate . ' +6 days'));

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{

/*Set limit for each patient to do one appointment for each department each day */
$query1 = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Email= '$email'and Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality'and Clinic_Appointment_Date='$Clinic_Appointment_Date' ";
$run1 = mysqli_query($conn,$query1); 
if (mysqli_num_rows($run1)>0){
   echo("<script> alert('Appointment Exist. Submission Failed'); window.location.href='(CA) Patient_Clinic_Appointment1.php'; </script>"); 
 
}
elseif($Clinic_Appointment_Date <= $appointmentAvailableDate)
{
   echo("<script> alert('Appointment only can be made 7 days in advance'); window.location.href='(CA) Patient_Clinic_Appointment1.php'; </script>"); 

}
else{

$sql = "INSERT INTO clinic_appointment (Clinic_Appointment_Name,Clinic_Appointment_Email,Clinic_Appointment_Phone,
Clinic_Appointment_Speciality,Clinic_Appointment_Date,Clinic_Appointment_Time,Clinic_Appointment_Identity_Credential,Patient_Gender,Patient_Birthdate)
values ('$Clinic_Appointment_Name','$Clinic_Appointment_Email','$Clinic_Appointment_Phone','$Clinic_Appointment_Speciality','$Clinic_Appointment_Date','$SelectedTimeSlot','$Clinic_Appointment_Identity_Credential'
,'$Patient_Gender','$Patient_Birthdate')";

$_SESSION['Clinic_Appointment_Speciality']=$Clinic_Appointment_Speciality;
$_SESSION['Clinic_Appointment_Date']=$Clinic_Appointment_Date;
$_SESSION['Clinic_Appointment_Time']=$SelectedTimeSlot;

if ($conn->query($sql)){
   echo("<script> window.location.href='(CA) Patient_Clinic_Appointment2.php'; </script>"); 
}
else{

echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}



?>
