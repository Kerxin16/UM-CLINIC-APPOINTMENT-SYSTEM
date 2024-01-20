<?php   

           $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

 if (isset($_GET['clinic_appointment_id'])) {  
      $clinic_appointment_id = $_GET['clinic_appointment_id']; 

      $query = "UPDATE clinic_appointment SET Clinic_Appointment_Acceptance=('ACCEPTED') , Patient_CheckIn_Status=('Awaiting_Patient_Check_In')
      WHERE clinic_appointment_id= '$clinic_appointment_id'";
      
      $run = mysqli_query($conn,$query);  
      if ($run) {  

           header('location:(CA) AppointmentApplication.php');  
      }else{  
           echo "Error: ".mysqli_error($conn);  
      }  
 }   
 ?> 
