<?php

/*Database Connection*/
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

session_start();
$email="".$_SESSION['email']."";

if(isset($_GET['Clinic_Appointment_Name'])&& isset($_GET['Clinic_Appointment_Identity_Credential'])&& isset($_GET['Clinic_Appointment_Speciality']) && isset($_GET['Clinic_Appointment_Date'])){  
    $CheckIn_Name = ($_GET['Clinic_Appointment_Name']);
    $CheckIn_IC = $_GET['Clinic_Appointment_Identity_Credential']; 
    $CheckIn_Department= $_GET['Clinic_Appointment_Speciality'];
    $Clinic_Appointment_Date= $_GET['Clinic_Appointment_Date']; 


      /*Change time zone to Malaysia time zone and get current date */
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $todayDate= date("Y-m-d"); 
      $checkInTime= date("h:i:sa");

      $selfCheckInAvaialableDateOne = date("Y-m-d", strtotime($Clinic_Appointment_Date . ' -1 days'));
      $selfCheckInAvaialableDateTwo = date("Y-m-d", strtotime($Clinic_Appointment_Date . ' -2 days'));
  

    /*Check Validity  */
    $validityAppointment = mysqli_query($conn, "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Name = '$CheckIn_Name' AND  
    Clinic_Appointment_Identity_Credential = '$CheckIn_IC' AND Clinic_Appointment_Speciality= '$CheckIn_Department' AND Clinic_Appointment_Date ='$Clinic_Appointment_Date' 
    AND Clinic_Appointment_Acceptance='ACCEPTED' AND Patient_CheckIn_Status='Awaiting_Patient_Check_In' AND Doctor_Diagnosis_Status!='DONE'");
   
  if(mysqli_num_rows($validityAppointment) > 0 ){  
      if($todayDate== $selfCheckInAvaialableDateOne || $todayDate==$selfCheckInAvaialableDateTwo ||$todayDate==$Clinic_Appointment_Date){
        /*Update Patient Check In Status */
        $query = "UPDATE clinic_appointment SET Patient_CheckIn_Status=('Checked_In'), Patient_CheckIn_Time=('$checkInTime') 
        WHERE Clinic_Appointment_Identity_Credential= '$CheckIn_IC' AND Clinic_Appointment_Name='$CheckIn_Name'
        AND Clinic_Appointment_Speciality= '$CheckIn_Department' AND Clinic_Appointment_Date='$Clinic_Appointment_Date' 
    AND Clinic_Appointment_Acceptance='ACCEPTED'  AND Patient_CheckIn_Status='Awaiting_Patient_Check_In' AND Doctor_Diagnosis_Status!='DONE' ";
          $result = mysqli_query($conn, $query);

  
      echo("<script> alert('Check in successfully.'); window.location.href='(CA) Patient_Check_In.php'; </script>"); 
      $conn->close();
      }else{

        echo("<script> alert('Check in for this appointment is not available now'); window.location.href='(CA) Patient_Check_In.php'; </script>"); 
        $conn->close();

      }
}else {
    /*Appointment Not Valid */
    echo("<script> alert('Your appointment is not valid'); window.location.href='(CA) Patient_Check_In.php'; </script>"); 
    $conn->close();
  }
}

?>


