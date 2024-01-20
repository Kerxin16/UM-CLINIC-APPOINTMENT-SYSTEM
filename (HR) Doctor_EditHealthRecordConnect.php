<?php
    if (isset($_POST['cancel'])) { 
      $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
      session_start();

      $Clinic_Appointment_Identity_Credential=$_SESSION['Clinic_Appointment_Identity_Credential'];
      $Clinic_Appointment_Speciality=$_SESSION['Clinic_Appointment_Speciality'];

      /*Change time zone to Malaysia time zone and get current date */
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $todayDate= date("Y-m-d"); 
      $DateTime = date("Y-m-d h:i:sa");

      $query= "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential= '$Clinic_Appointment_Identity_Credential'and Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality'and Clinic_Appointment_Date='$todayDate' ";
      $run= mysqli_query($conn,$query); 
      $result = mysqli_fetch_assoc($run); 

      header("Location: (HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."");

  }


if(isset($_POST["edit"])){ 

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  session_start();
  $Clinic_Appointment_Identity_Credential=$_SESSION['Clinic_Appointment_Identity_Credential'];
  $Clinic_Appointment_Speciality=$_SESSION['Clinic_Appointment_Speciality'];
  
  $HealthRecordAdvice = filter_input(INPUT_POST, 'advice');
  $HealthRecordDiagnosis = filter_input(INPUT_POST, 'diagnosis');
  $HealthRecordID = filter_input(INPUT_POST, 'hrID');

    /*Change time zone to Malaysia time zone and get current date */
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todayDate= date("Y-m-d"); 
    $DateTime = date("Y-m-d h:i:sa");
   
    $query= "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential= '$Clinic_Appointment_Identity_Credential'and Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality'and Clinic_Appointment_Date='$todayDate' ";
    $run= mysqli_query($conn,$query); 
    $result = mysqli_fetch_assoc($run);
    $Clinic_Appointment_ID="".$result['clinic_appointment_id']."";

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{

$sql = "UPDATE health_record SET Health_Record_Advice='" . addslashes($HealthRecordAdvice) . "',Health_Record_Diagnosis='" . addslashes($HealthRecordDiagnosis) . "'
WHERE Health_Record_ID='$HealthRecordID'";

if ($conn->query($sql)){
  header("Location: (HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."");
}
else{

echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}


?>
