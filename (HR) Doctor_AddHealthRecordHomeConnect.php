<?php

/*Add Health Record */
if (isset($_POST['AddRecord'])) {  
    header("Location:(HR) Doctor_AddHealthRecord.php");

}


/*Unset Session */
if (isset($_POST['back'])) {  

    unset($Clinic_Appointment_Speciality);
    unset($Clinic_Appointment_Identity_Credential);
    header("Location: (CA) ClinicAppointmentDoctorView.php");

}



?>




