<?php

$Clinic_Appointment_Name = filter_input(INPUT_POST, 'Clinic_Appointment_Name');
$Clinic_Appointment_Email = filter_input(INPUT_POST, 'Clinic_Appointment_Email');
$Clinic_Appointment_Phone = filter_input(INPUT_POST, 'Clinic_Appointment_Phone');
$Clinic_Appointment_Speciality = filter_input(INPUT_POST, 'Clinic_Appointment_Speciality');
$Clinic_Appointment_Reason_Of_Appointment = filter_input(INPUT_POST, 'Clinic_Appointment_Reason_Of_Appointment');
$Clinic_Appointment_Date = filter_input(INPUT_POST, 'Clinic_Appointment_Date');
$Clinic_Appointment_Time = filter_input(INPUT_POST, 'Clinic_Appointment_Time');
$Clinic_Appointment_Case_Type = filter_input(INPUT_POST, 'Clinic_Appointment_Case_Type');
$Clinic_Appointment_Identity_Credential = filter_input(INPUT_POST, 'Clinic_Appointment_Identity_Credential');
$Patient_Gender = filter_input(INPUT_POST, 'Patient_Gender');
$Patient_Birthdate = filter_input(INPUT_POST, 'Patient_Birthdate');

/*Change time zone to Malaysia time zone and get current date */
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate= date("Y-m-d"); 
$checkInTime= date("h:i:sa");


// Create connection
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO clinic_appointment (Clinic_Appointment_Name,Clinic_Appointment_Email,Clinic_Appointment_Phone,
Clinic_Appointment_Speciality,Clinic_Appointment_Reason_Of_Appointment,Clinic_Appointment_Date,Clinic_Appointment_Time,Clinic_Appointment_Case_Type,Clinic_Appointment_Identity_Credential,
Patient_Gender,Patient_Birthdate,Clinic_Appointment_Acceptance,Patient_CheckIn_Status,Patient_CheckIn_Time,Clinic_Appointment_Selected_Doctor)
values ('$Clinic_Appointment_Name','$Clinic_Appointment_Email','$Clinic_Appointment_Phone','$Clinic_Appointment_Speciality'
,'$Clinic_Appointment_Reason_Of_Appointment','$Clinic_Appointment_Date','$Clinic_Appointment_Time','$Clinic_Appointment_Case_Type','$Clinic_Appointment_Identity_Credential',
'$Patient_Gender','$Patient_Birthdate','ACCEPTED','Checked_In','$checkInTime','-')";
if ($conn->query($sql)){

   echo("<script> alert('Appointment Application Submitted Successfully.'); window.location.href='(CA) MS_WalkInPatient.php'; </script>"); 
 
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}



?>

