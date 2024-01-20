<?php
/*Unset Session */
if (isset($_POST['back'])) {  

    unset($Clinic_Appointment_Speciality);
    unset($Clinic_Appointment_Identity_Credential);
    header("Location: (HR) DoctorFullHRList.php");

}

?>