<?php
  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  
  //Delete
  if(isset($_POST['delete'])){
    $Clinic_Appointment_Identity_Credential = filter_input(INPUT_POST, 'Clinic_Appointment_Identity_Credential');
    $Clinic_Appointment_Speciality = filter_input(INPUT_POST, 'Clinic_Appointment_Speciality');
    $Clinic_Appointment_Date = filter_input(INPUT_POST, 'Clinic_Appointment_Date');


    echo" $Clinic_Appointment_Identity_Credential<br>$Clinic_Appointment_Speciality<br>$Clinic_Appointment_Date";

   $deleteQuery = "DELETE FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential='$Clinic_Appointment_Identity_Credential'AND Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality'
     AND Clinic_Appointment_Date='$Clinic_Appointment_Date' ";  
     $deleted = mysqli_query($conn,$deleteQuery);  
     if ($deleted) {  
         header('location:(CA) MS_Full_Appointment_List.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }
  
    
  }  

?>



