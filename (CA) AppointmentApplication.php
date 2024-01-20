<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <style>

    /*Make whole document center*/
    .centered {
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0%);
        background-color:#a3c2c2;

  }

/*Link Colour */
 a:link  {
    text-decoration:none;
}

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


/*Table*/
table,th,tr,td{  
    
    border: 2px solid; 
  text-align: center;
  }

  .data td,tr{
 
    border: 2px solid; 
  text-align: center;

  }

  /*Alert */
  .dateAlert{
    color:#B90000;
  }

  
 </style>
</head>


<body class="centered">
<!--Appoinment Application*-->
    <p   style="width:1850px">
        
        <?php 
        /*Date For Alert Use*/
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate=date("Y-m-d"); 
$appointmentDate = date("Y-m-d", strtotime($todayDate . ' +4 days'));


           $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
           $query = "SELECT * FROM clinic_appointment WHERE (Clinic_Appointment_Acceptance= 'Pending MS Action' AND Patient_CheckIn_Status='Pending MS Action') order by Clinic_Appointment_Date asc
           ";
            $query_run = mysqli_query($conn, $query);

                  ?>

<form action=" " method="get">
<table  style="width:100%">  
<thead>
      <tr >
        <th colspan="2"style="width:2%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">No</th>  
           <th style="width:13%;font-size:20px;   font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Name </th>  
           <th style="width:10%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">IC/Passport</th>  
           <th style="width:12%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Email</th> 
           <th style="width:10%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Phone</th> 
           <th style="width:10%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Department</th> 
           <th style="width:5%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Type Of Case</th>
           <th style="width:5%;font-size:20px;   font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Selected Doctor</th>  
           <th style="width:13%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Reason Of Appointment</th>
           <th style="width:5%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Date</th>  
           <th style="width:5%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Time Slot</th>
           <th colspan="2"  style="width:10%;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Acceptance</th>
      </tr> 
  </thead>
      <?php   

      $i=1;  
           if ($num = mysqli_num_rows($query_run)>0) {  
                while ($result = mysqli_fetch_assoc($query_run)) {       
                    if($result['Clinic_Appointment_Date']<= $appointmentDate){
                     echo "  
                          <tr class='data'>  
                          <td colspan='2'><span class='dateAlert'>".$i++." </span><input type='hidden' value=".$result['clinic_appointment_id']."></td>
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Name']."</span></td>  
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Identity_Credential']."</span></td>  
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Email']."</span></td>  
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Phone']."</span></td> 
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Speciality']."</span></td>   
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Case_Type']."</span></td>
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Selected_Doctor']."</span></td>      
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Reason_Of_Appointment']."</span></td>   
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Date']."</span></td> 
                               <td><span class='dateAlert'>".$result['Clinic_Appointment_Time']."</span></td> "?>               
                               <td><?php echo "<a class='blue' href='(CA) MS_AppointmentAccept.php?clinic_appointment_id=".$result['clinic_appointment_id']."'
                                clinic_appointment_id='btn'> Accept</a>" ?></td>
                              <td>
                                <a class="red" href="#" onclick="showRejectConfirmation(
                                    '<?php echo $result['clinic_appointment_id']; ?>'
                                );">Reject</a>
                            </td>
                        <?php
                         echo" </tr>  
                     ";  
                }  else{
                              echo "  
                                   <tr class='data'>  
                                   <td colspan='2'>".$i++." <input type='hidden' value=".$result['clinic_appointment_id']."></td>
                                        <td>".$result['Clinic_Appointment_Name']."</td>  
                                        <td>".$result['Clinic_Appointment_Identity_Credential']."</td>  
                                        <td>".$result['Clinic_Appointment_Email']."</td>  
                                        <td>".$result['Clinic_Appointment_Phone']."</td> 
                                        <td>".$result['Clinic_Appointment_Speciality']."</td>   
                                        <td>".$result['Clinic_Appointment_Case_Type']."</td>
                                        <td>".$result['Clinic_Appointment_Selected_Doctor']."</td>      
                                        <td>".$result['Clinic_Appointment_Reason_Of_Appointment']."</td>   
                                        <td>".$result['Clinic_Appointment_Date']."</td> 
                                        <td>".$result['Clinic_Appointment_Time']."</td> "?>               
                                        <td><?php echo "<a class='blue' href='(CA) MS_AppointmentAccept.php?clinic_appointment_id=".$result['clinic_appointment_id']."'
                                         clinic_appointment_id='btn'> Accept</a>" ?></td>
                                         <td>
                                              <a class="red" href="#" onclick="showRejectConfirmation(
                                                  '<?php echo $result['clinic_appointment_id']; ?>'
                                              );">Reject</a>
                                          </td>
                                 <?php
                                  echo" </tr>  
                              ";  
                }
            
            }
 }
              else{echo "<span style=\"color:#669999;font-size:20px;    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No New Appointment Application</b></span>";}

          ?>

  
</table>
</form>

     


</body>
</html>


<script>
    function showRejectConfirmation(clinicAppointmentId) {
        var confirmation = confirm("Are you sure you want to reject this appointment?");
        if (confirmation) {
            // If the user clicks "OK" in the confirmation dialog, redirect to the rejection page
            window.location.href = "(CA) MS_AppointmentReject.php?clinic_appointment_id=" + clinicAppointmentId;
        } else {
            // If the user clicks "Cancel" in the confirmation dialog, do nothing
        }
    }
</script>