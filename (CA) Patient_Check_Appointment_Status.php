<?php
  $Title='Clinic Appointment- Check Appoinment Status';
  include_once("(1) NavBar(Patient).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
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
  
      /* Applied Appointment Text*/
      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    }

   
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

    /*Link Color */
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
    text-decoration:none;
}

/* Rejected appointmwnt*/
.rejected{
  color:#B90000;

}

/*Reminder */
.reminder{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 20px;
  color:black;
  background-color:#d9f2e6; 
  border-radius:20px;
  border:1px solid #b30000;
  height:60px;
  display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
}

    /*pagination*/

    .page{
        color:black;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
        font-size: 16px;
        padding: 6px;
        border: 1px solid black;
    }

    .page:hover{
      color:white;
    }
    a{
      text-decoration: none;
    }

    td{
      height: 50px;
    }

  </style>


</head>

<body class='body'>
<div class=centered>
  <br><br><br><br><br>
  <div class="reminder" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#b30000" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>&nbsp;&nbsp;&nbsp;Gentle Reminder: (a) Rejected Appointment will be deleted automatically three days after the requested appointment date.<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;(b) Checked In Appointment Cannot Be Cancelled
</div>
<br>

<header class=headerCentered>
<span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Applied Appointment Status</b></span>
  </header>

<br>
  <div style="font-size:18px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;color:blue">&nbsp; MS- Medical Staff</div>

  <br>

<table  style="width:100%">  
<thead>
      <tr >
      <th style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">No</th>  
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Name</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Identity Credential</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Date</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Slot</th> 
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Department</th> 
           <th style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Doctor Selected</th>
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Status</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Check In Status</th>
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Cancel Appointment</th>

      </tr> 
  </thead>
  <tbody>
      <?php  
      //PAGINATION
      //define total number of results you want per page  
      $results_per_page = 7;  
      
      //find the total number of results stored in the database  
      $query = "SELECT * FROM clinic_appointment 
      WHERE Doctor_Diagnosis_Status != 'DONE' AND  Clinic_Appointment_Email ='$email' order by Clinic_Appointment_Date asc";  
      $run = mysqli_query($conn,$query);  
      $number_of_result = mysqli_num_rows($run);  


      //determine the total number of pages available  
      $number_of_page = ceil ($number_of_result / $results_per_page);  

      //determine which page number visitor is currently on  
      if (!isset ($_GET['page']) ) {  
          $page = 1;  
      } else {  
          $page = $_GET['page'];  
      }  

      //determine the sql LIMIT starting number for the results on the displaying page  
      $page_first_result = ($page-1) * $results_per_page;  

      $query = "SELECT * FROM clinic_appointment 
      WHERE Doctor_Diagnosis_Status != 'DONE' AND  Clinic_Appointment_Email ='$email' order by Clinic_Appointment_Date asc LIMIT " . $page_first_result . ',' . $results_per_page;  
      $run = mysqli_query($conn,$query); 


       //Today Date
       date_default_timezone_set("Asia/Kuala_Lumpur");
       $todayDate=date("Y-m-d"); 
        $i=1;  


        //For IS NULL condition use
        // Build and execute the query
        $null = "Select * from um_healthcare_system.clinic_appointment where Clinic_Appointment_Case_Type IS NULL;";
        $nullResult = mysqli_query($conn,$null); 

           if ($num = mysqli_num_rows($run)>0) { 
                while ($result = mysqli_fetch_assoc($run)) {
                  if( $todayDate >=  date("Y-m-d", strtotime($result['Clinic_Appointment_Date']. ' +3 days')) && $result['Clinic_Appointment_Acceptance'] =='REJECTED'){
                    
                    //Delete expired rejected appointment 
                    $deleteQuery = "DELETE FROM clinic_appointment WHERE clinic_appointment_id='".$result['clinic_appointment_id']."' ";  
                    $deleted = mysqli_query($conn,$deleteQuery);  
                       
                   }
                   elseif($result['Patient_CheckIn_Status'] =='Checked_In' && $result['Clinic_Appointment_Date']< $todayDate) {
                    //Checked in but not attend
                    $updateQuery = "UPDATE  clinic_appointment SET Patient_CheckIn_Status='Checked_In_But_Not_Attend', Doctor_Diagnosis_Status = 'DONE' WHERE clinic_appointment_id='".$result['clinic_appointment_id']."' ";  
                    $updated = mysqli_query($conn,$updateQuery); 
                    echo("<script>window.location.href='(CA) Patient_Check_Appointment_Status.php'; </script>");
 

                 }elseif($result['Patient_CheckIn_Status'] =='Awaiting_Patient_Check_In' && $result['Clinic_Appointment_Date']< $todayDate) {
                  //Not checked in
                  $updateQuery1 = "UPDATE  clinic_appointment SET Patient_CheckIn_Status='Patient_Not_Check_In', Doctor_Diagnosis_Status = 'DONE' WHERE clinic_appointment_id='".$result['clinic_appointment_id']."' ";  
                  $updated1 = mysqli_query($conn,$updateQuery1);  
                  echo("<script>window.location.href='(CA) Patient_Check_Appointment_Status.php'; </script>");

               }
               elseif($numNull = mysqli_num_rows($nullResult)>0 ){
                //Delete appointment without required information
                $deleteQuery1 = "DELETE FROM clinic_appointment WHERE Clinic_Appointment_Case_Type IS NULL";  
                $deleted1 = mysqli_query($conn,$deleteQuery1);  
                echo("<script>window.location.href='(CA) Patient_Check_Appointment_Status.php'; </script>");

                   
               }
                  elseif($result['Clinic_Appointment_Acceptance'] =='REJECTED') {
                    echo " 
                          <tr class='data'>  
                          <td ><span class='rejected'>".$i++."</span></td>  
                               <td><span class='rejected'>".$result['Clinic_Appointment_Name']."</span></td>  
                               <td><span class='rejected'>".$result['Clinic_Appointment_Identity_Credential']."</span></td>  
                               <td><span class='rejected'>".$result['Clinic_Appointment_Date']."</span></td>
                               <td><span class='rejected'>".$result['Clinic_Appointment_Time']."</span></td>    
                               <td><span class='rejected'>".$result['Clinic_Appointment_Speciality']."</span></td>
                               <td><span class='rejected'>".$result['Clinic_Appointment_Selected_Doctor']."</span></td>
                               <td><span class='rejected'>".$result['Clinic_Appointment_Acceptance']."</span></td>  
                               <td><span class='rejected'>".$result['Patient_CheckIn_Status']."</span></td>    
                               <td>"; ?>
                                    <a class="red" href="#" onclick="showCancelConfirmation(
                                        '<?php echo $result['Clinic_Appointment_Identity_Credential']; ?>',
                                        '<?php echo $result['Clinic_Appointment_Speciality']; ?>',
                                        '<?php echo $result['Clinic_Appointment_Date']; ?>'
                                    );">Cancel</a>
                                    <?php echo"
                                </td>
                               </tr>  
                            
                     ";  
                  }  elseif($result['Patient_CheckIn_Status'] =='Checked_In' && $result['Clinic_Appointment_Date']>=$todayDate) {
                     echo "  
                          <tr class='data'>  
                          <td >".$i++."</td>  
                               <td>".$result['Clinic_Appointment_Name']."</td>  
                               <td>".$result['Clinic_Appointment_Identity_Credential']."</td>  
                               <td>".$result['Clinic_Appointment_Date']."</td>
                               <td>".$result['Clinic_Appointment_Time']."</td>    
                               <td>".$result['Clinic_Appointment_Speciality']."</td>
                               <td>".$result['Clinic_Appointment_Selected_Doctor']."</td>
                               <td>".$result['Clinic_Appointment_Acceptance']."</td>  
                               <td>".$result['Patient_CheckIn_Status']."</td>    
                               <td>Appointment Cannot Be Cancelled</td> 
                               </tr>  
                     ";  
                  }elseif(  $result['Clinic_Appointment_Date']>=$todayDate){
                     echo "  
                          <tr class='data'>  
                          <td >".$i++."</td>  
                               <td>".$result['Clinic_Appointment_Name']."</td>  
                               <td>".$result['Clinic_Appointment_Identity_Credential']."</td>  
                               <td>".$result['Clinic_Appointment_Date']."</td>
                               <td>".$result['Clinic_Appointment_Time']."</td>    
                               <td>".$result['Clinic_Appointment_Speciality']."</td>
                               <td>".$result['Clinic_Appointment_Selected_Doctor']."</td>
                               <td>".$result['Clinic_Appointment_Acceptance']."</td>  
                               <td>".$result['Patient_CheckIn_Status']."</td>    
                               <td>"; ?>
                                    <a class="red" href="#" onclick="showCancelConfirmation(
                                        '<?php echo $result['Clinic_Appointment_Identity_Credential']; ?>',
                                        '<?php echo $result['Clinic_Appointment_Speciality']; ?>',
                                        '<?php echo $result['Clinic_Appointment_Date']; ?>'
                                    );">Cancel</a>
                                    <?php echo"
                                </td>
                               </tr>  
                     ";  
                  }
                }  
 }
                else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No Record Found</b></span>";}


?>
 </tbody></table>
 <?php
                echo"<br><br>";
                //display the link of the pages in URL  
                for($page = 1; $page<= $number_of_page; $page++) {  
                 echo '<a  class="page" href="(CA) Patient_Check_Appointment_Status.php?page='. $page .'">' . $page . '</a> ';
               }  
           
             echo"<br>"

          ?>

 
</body>
</html>

<script>
    function showCancelConfirmation(identityCredential, speciality, appointmentDate) {
        var confirmation = confirm("Are you sure you want to cancel this appointment?");
        if (confirmation) {
            // If the user clicks "OK" in the confirmation dialog, redirect to the cancellation page
            window.location.href = "(CA) Patient_CancelAppointment.php?Clinic_Appointment_Identity_Credential=" + identityCredential + "&Clinic_Appointment_Speciality=" + speciality + "&Clinic_Appointment_Date=" + appointmentDate;
        } else {
            // If the user clicks "Cancel" in the confirmation dialog, do nothing
        }
    }
</script>