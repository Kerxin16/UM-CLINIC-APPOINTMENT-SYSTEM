<?php

/* Add New Health Record */
if (isset($_POST['add'])) {  
    $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
    session_start();
    $Clinic_Appointment_Identity_Credential = $_SESSION['Clinic_Appointment_Identity_Credential'];
    $Clinic_Appointment_Speciality = $_SESSION['Clinic_Appointment_Speciality'];
    
    $HealthRecordAdvice = filter_input(INPUT_POST, 'advice');
    $HealthRecordDiagnosis = filter_input(INPUT_POST, 'diagnosis');
    
    /* Validate that advice and diagnosis are not empty */
    if (empty($HealthRecordAdvice) || empty($HealthRecordDiagnosis)) {
        echo("<script>alert('Diagnosis result and advice column cannot be empty.'); window.location.href='(HR) Doctor_AddHealthRecord.php';</script>");
    } else {
        /* Change time zone to Malaysia time zone and get current date */
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate = date("Y-m-d"); 
        $DateTime = date("Y-m-d h:i:sa");
        
        $query = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential = '$Clinic_Appointment_Identity_Credential' 
                  AND Clinic_Appointment_Speciality = '$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date = '$todayDate'";
        $run = mysqli_query($conn, $query); 
        $result = mysqli_fetch_assoc($run);
        $Clinic_Appointment_ID = $result['clinic_appointment_id'];
        
        if (mysqli_connect_error()) {
            die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO health_record (Health_Record_Diagnosis, Health_Record_Advice, Health_Record_Created_DateTime, Clinic_Appointment)
                    VALUES ('" . addslashes($HealthRecordDiagnosis) . "','" . addslashes($HealthRecordAdvice) . "','$DateTime','$Clinic_Appointment_ID')";
            
            if ($conn->query($sql)) {
                header("Location: (HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."");
            } else {
                echo "Error: ". $sql ."
                ". $conn->error;
            }
            $conn->close();
        }
    }
}

if (isset($_POST['cancel'])) { 
    $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
    session_start();
    $Clinic_Appointment_Identity_Credential=$_SESSION['Clinic_Appointment_Identity_Credential'];
    $Clinic_Appointment_Speciality=$_SESSION['Clinic_Appointment_Speciality'];
    
    /* Change time zone to Malaysia time zone and get current date */
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $todayDate= date("Y-m-d"); 
    $DateTime = date("Y-m-d h:i:sa");
    
    $query= "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential= '$Clinic_Appointment_Identity_Credential' 
             AND Clinic_Appointment_Speciality='$Clinic_Appointment_Speciality' AND Clinic_Appointment_Date='$todayDate' ";
    $run= mysqli_query($conn, $query); 
    $result = mysqli_fetch_assoc($run); 
    
    header("Location: (HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."");
}

?>