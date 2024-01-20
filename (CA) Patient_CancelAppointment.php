<?php   
/*Patient Cancel the appointment */
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');


if (isset($_GET['Clinic_Appointment_Identity_Credential'])&& isset($_GET['Clinic_Appointment_Speciality']) && isset($_GET['Clinic_Appointment_Date'])) {  
     $Clinic_Appointment_Identity_Credential = $_GET['Clinic_Appointment_Identity_Credential']; 
     $Clinic_Appointment_Speciality=$_GET['Clinic_Appointment_Speciality'];
     $Clinic_Appointment_Date=$_GET['Clinic_Appointment_Date']; 

      $query = "DELETE FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential='$Clinic_Appointment_Identity_Credential'AND Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality'
      AND Clinic_Appointment_Date='$Clinic_Appointment_Date' ";  
      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location:(CA) Patient_Check_Appointment_Status.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?> 

