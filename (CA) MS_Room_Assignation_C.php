<?php
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

if(isset($_POST["assigned"])){ 

    $clinic_appointment_id = filter_input(INPUT_POST, 'clinic_appointment_id');
    $doctorID = filter_input(INPUT_POST, 'doctorID');
    $doctorDepartment = filter_input(INPUT_POST, 'Clinic_Appointment_Speciality');
    
    
    //Query to detect whether doctor id is existed
    $doctorQuery = "SELECT * FROM doctor where doctor_id='$doctorID'";
    $query_run1 = mysqli_query($conn, $doctorQuery);
    
    //Query to detect whether doctor id is match with department
    $doctorDepartmentQuery = "SELECT * FROM doctor where doctor_id='$doctorID' AND Doctor_Department='$doctorDepartment'";
    $query_run3 = mysqli_query($conn, $doctorDepartmentQuery);
    
       // mysql query to Update data
       if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
        }elseif(mysqli_num_rows($query_run1)== 0){
            // Doctor Not Exist
            echo("<script> alert('Doctor Not Exists. Please ensure the doctor id is entered correctly.'); window.location.href='(CA) MS_Room_Assignation_Patient_Details.php'; </script>"); 
        }elseif(mysqli_num_rows($query_run3)== 0){
            //Doctor Not Match With Department
            echo("<script> alert('Please ensure the doctor id entered is matched with doctor department.'); window.location.href='(CA) MS_Room_Assignation_Patient_Details.php'; </script>"); 
        }
        else{
            //Assigned Successfully
        $updateQuery = "UPDATE clinic_appointment SET Room_Assignation_Status=('ASSIGNED'), Room_Assignation_Doctor_ID=('$doctorID')
        WHERE clinic_appointment_id= '$clinic_appointment_id'";
         $query_run2 = mysqli_query($conn, $updateQuery);
    
     if($query_run2)
     {    
      header("Location:(CA) MS_Room_Assignation_Patient_Details.php");
     
     }else{
      echo "Error: ". $result ."
      ". $conn->error;
     
     }
     mysqli_close($conn);
        
    }
    }
    

?>
