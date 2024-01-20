<?php   

           $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

           if (isset($_GET['Clinic_Appointment_Identity_Credential'])&& isset($_GET['Clinic_Appointment_Speciality'])) {   
      $Clinic_Appointment_Identity_Credential = $_GET['Clinic_Appointment_Identity_Credential']; 
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $todayDate= date("Y-m-d"); 
      $Clinic_Appointment_Speciality=$_GET['Clinic_Appointment_Speciality'];

      $query = "UPDATE clinic_appointment SET Doctor_Patient_View=('Close')WHERE Clinic_Appointment_Identity_Credential='$Clinic_Appointment_Identity_Credential'
      AND Clinic_Appointment_Date='$todayDate' AND Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality'";  

      $run = mysqli_query($conn,$query);  
      if ($run) {  
           header('location:(CA) ClinicAppointmentDoctorView.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }  
 ?> 




 
