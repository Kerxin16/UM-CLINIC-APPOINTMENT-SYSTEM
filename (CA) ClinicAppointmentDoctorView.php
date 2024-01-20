<?php
  $Title='Clinic Appointment';
  include_once("(1) NavBar(Doctor).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  /*Change time zone to asia time zone and get current date */
  date_default_timezone_set("Asia/Kuala_Lumpur");
  $todayDate= date("Y-m-d"); 
  $email=$_SESSION['email'];
  
  $query = "SELECT * FROM clinic_appointment 
  JOIN doctor on Room_Assignation_Doctor_ID= doctor_id
  WHERE Clinic_Appointment_Date= '$todayDate' AND  Room_Assignation_Status= 'ASSIGNED' AND Doctor_Email ='$email' AND Doctor_Patient_View=('Open')";  
  $run = mysqli_query($conn,$query);  
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <style>
    /*Background Color */
    .body{
      background-color:#c2d6d6;
    }
    
    /*Make whole document center*/
    .centered {
      padding: 0;  
      margin-left: 50px;  
      margin-right: 50px;  
      box-sizing: border-box;  
  }
  
      /* Clinical Appointment Text*/
      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

   
/*Button */
.btn{
  background:#c2d6d6;
  cursor: pointer;
  width:120px;
  text-align: center;
}

/*Data*/
.data{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 16px;
  height:40px;
}

/*Table*/
table,th,tr,td{  
    
      border: 2px solid; 
    text-align: center;
    }

    .data td,tr{
   
      border: 2px solid; 
    text-align: center;

    }

    /*link color*/

    .blue{
    color:#007BFF;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size: 16px;
    text-decoration:none;
    border: 1px solid #007BFF;
    padding: 8px;
    border-radius: 5px;
    height: 40px;
}

.blue:hover{
    border: 1px solid black;
    color:black;
}

.red{
    color:#dc3545;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 16px;
    text-decoration:none;
    border: 1px solid #dc3545;
    padding: 8px;
    border-radius: 5px;
    height: 40px;
}

.red:hover{
    border: 1px solid black;
    color:black;
}

.green{
    color:green;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size: 16px;
    text-decoration:none;
    border: 1px solid green;
    padding: 8px;
    border-radius: 5px;
    height: 40px;
}

.green:hover{
    border: 1px solid black;
    color:black;
}

td{
height: 50px;
}

.grey{
  color:#a6a6a6;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size: 16px;
    text-decoration:none;
    border: 1px solid #a6a6a6;
    padding: 8px;
    border-radius: 5px;
    height: 40px;

}
.grey:hover{
  text-decoration: none;
  color:#a6a6a6;
}

  </style>


</head>

<body class='body'>
<div class=centered>
  <br>
  <br>
<Header class=headerCentered>
<br> <br>
<span  style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Daily Appointment</b></span>
  </Header>


  <br>

<table  style="width:100%">  
<thead>
      <tr >
        <th style="width:5px;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">No</th>  
           <th style="width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Name</th>  
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Reason Of Appointment</th>  
           <th style="width:10%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Type Of Case</th>  
           <th style="width:15%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Department</th>
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Time Slot</th>  
           <th style="width:10%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Health Record</th> 
           <th style="width:5%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Call Patient</th>
           <th style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Done Diagnosis</th>  
           <th style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Close Record</th>
      </tr> 
  </thead>
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) { 
                  if($result['Doctor_Call_Patient']=='CALLED' && $result['Doctor_Diagnosis_Status']=='DONE'){
                    echo "  
                    <tr class='data'>  
                    <td >".$i++."</td>  
                         <td>".$result['Clinic_Appointment_Name']."</td>  
                         <td>".$result['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                         <td>".$result['Clinic_Appointment_Case_Type']."</td>  
                         <td>".$result['Clinic_Appointment_Speciality']."</td>
                         <td>".$result['Clinic_Appointment_Time']."</td>                              
                         <td><a class='blue' href='(HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."' 
                         Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality='btn' >Health Record</span></a></td>
                         <td><a class='grey' >Call</a></td>
                         <td><a class='grey' >Done</a></td>"?>
                         <td>
                         <a class='red' href='#' onclick='confirmClose("<?php echo $result['Clinic_Appointment_Identity_Credential']; ?>", "<?php echo $result['Clinic_Appointment_Speciality']; ?>")'>Close</a>
                       </td>
                       <?php echo"
                    </tr>  
               ";  

                  }elseif($result['Doctor_Call_Patient']=='CALLED'){
                    echo "  
                         <tr class='data'>  
                         <td >".$i++."</td>  
                              <td>".$result['Clinic_Appointment_Name']."</td>  
                              <td>".$result['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                              <td>".$result['Clinic_Appointment_Case_Type']."</td>  
                              <td>".$result['Clinic_Appointment_Speciality']."</td>
                              <td>".$result['Clinic_Appointment_Time']."</td>                              
                              <td><a class='blue' href='(HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."' 
                              Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality='btn' >Health Record</span></a></td>
                              <td><a class='grey' >Call</a></td>
                              <td><a class='green'href='(CA) DoctorDoneDiagnosis.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."' 
                              Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality='btn'>Done</a></td>"?>
                              <td>
                              <a class='red' href='#' onclick='confirmClose("<?php echo $result['Clinic_Appointment_Identity_Credential']; ?>", "<?php echo $result['Clinic_Appointment_Speciality']; ?>")'>Close</a>
                            </td>
                            <?php echo"
                         </tr>  
                    ";  
                 }
               else{
                     echo "  
                          <tr class='data'>  
                          <td >".$i++."</td>  
                               <td>".$result['Clinic_Appointment_Name']."</td>  
                               <td>".$result['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                               <td>".$result['Clinic_Appointment_Case_Type']."</td>  
                               <td>".$result['Clinic_Appointment_Speciality']."</td>
                               <td>".$result['Clinic_Appointment_Time']."</td>                              
                               <td><a class='blue' href='(HR) DoctorHealthRecord.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."' 
                               Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality='btn' >Health Record</span></a></td>
                               <td><a class='blue' href='(CA) DoctorCallPatient.php? Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."' 
                               Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality='btn' >Call</a></td>
                               <td><a class='green'href='(CA) DoctorDoneDiagnosis.php?Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."' 
                               Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality='btn'>Done</a></td>"?>
                               <td>
                               <a class='red' href='#' onclick='confirmClose("<?php echo $result['Clinic_Appointment_Identity_Credential']; ?>", "<?php echo $result['Clinic_Appointment_Speciality']; ?>")'>Close</a>
                             </td>
                             <?php echo"
                          </tr>  
                     ";  
                  }
                }  
 }
              else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>Currently No Awaiting Patient</b></span>";}
          ?>

  
</table>
</body>
</html>


<script>
function confirmClose(identityCredential, speciality) {
  var result = confirm("Are you sure you want to close this appointment view?");
  if (result) {
    // If the user clicks "OK," navigate to the close page
    window.location.href = '(CA) DoctorViewUpdate.php?Clinic_Appointment_Identity_Credential=' + identityCredential + '&& Clinic_Appointment_Speciality=' + speciality;
  }
  // If the user clicks "Cancel," do nothing
}
</script>