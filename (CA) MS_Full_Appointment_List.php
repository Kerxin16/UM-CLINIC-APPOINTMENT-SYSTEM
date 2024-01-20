<?php
  $Title='Clinic Appointment- Appointment List';
  include_once("(1) NavBar(MS).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

 
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
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

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

    /*Delete Button */
    .delete{
    background-color:	 #c2d6d6;
    color:	 red;
    border: 1px solid red;
  }

  .delete:hover{
    background-color: #c2d6d6;
    color:	 black;
    border: 1px solid black;

  }

  /*Search and reset button */
  .btn{
    background:#424b57;
    color:#c2d6d6;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size:18px;
    height:40px;
    border-radius: 0px;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

     /*Make whole document center*/
     .centered1{
        position: absolute;
        left: 50%;
        transform: translate(-50%, 0%);
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
   width:1850px;

}
  </style>
</head>

<body class='body'>
<div class=centered>
  <br><br><br><br><br>
 
 <!--Reminder-->
<div class="centered1">
 <div class="reminder" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#b30000" class="bi bi-bell" viewBox="0 0 16 16">
  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
</svg>&nbsp;&nbsp;&nbsp;Gentle Reminder: Checked In Appointment Cannot Be Deleted
</div>
</div>
<br><br><br><br><br><br>
<header class=headerCentered>
  
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Appointments List</b></span>
  </header>

 <!--Search Patient-->
  <form action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="Get">
<table style="float:right">
<tr>   
<td style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;width:130px;"><label for="searchPatient">Search Patient</label></td>
<td><input name="Clinic_Appointment_Identity_Credential" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;height:40px" placeholder="Enter IC / Password" required></input>
</td>
<td><button type="submit" class="btn" name="searchPatient">Search</button></td>
</tr>
</table>
</form>

<form action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="Get">
<table>
<td><button type="submit" class="btn" name="Reset">Reset Search</button></td>
<table>
</form>


  <br> <br> <br> 
<table  style="width:100%">  
<thead>
      <tr >
      <th style="width:3%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">No</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Name</th>  
           <th style="width:7%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">IC / Password</th>
           <th style="width:7%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Email</th>  
           <th style="width:7%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Phone</th>  
           <th style="width:14%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Department</th> 
           <th style="width:7%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Case Type</th>
           <th style="width:5%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Selected Doctor</th>  
           <th style="width:12%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Reason</th>  
           <th style="width:6%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Date</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Time</th> 
           <th style="width:7%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Delete</th>

      </tr> 
  </thead>
      <?php
      //Today Date
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $todayDate=date("Y-m-d"); 

       if(!isset($_GET['searchPatient']) || isset($_GET['Reset'])){   
        //Display all items except rejected appointment
  $query = "SELECT * FROM clinic_appointment WHERE Doctor_Diagnosis_Status!='DONE' && Clinic_Appointment_Acceptance!='REJECTED' order by Clinic_Appointment_Date asc;
  "; 
  $run = mysqli_query($conn,$query); 
      $i=1;  
        //Today Date
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate=date("Y-m-d"); 
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) { 
                  if($result['Patient_CheckIn_Status'] =='Checked_In' && $result['Clinic_Appointment_Date']>=$todayDate) {
                    echo "  
                    <tr class='data'>  
                    <td >".$i++."</td>  
                         <td>".$result['Clinic_Appointment_Name']."</td>  
                         <td>".$result['Clinic_Appointment_Identity_Credential']."</td> 
                         <td>".$result['Clinic_Appointment_Email']."</td>  
                         <td>".$result['Clinic_Appointment_Phone']."</td>  
                         <td>".$result['Clinic_Appointment_Speciality']."</td>
                         <td>".$result['Clinic_Appointment_Case_Type']."</td>
                         <td>".$result['Clinic_Appointment_Selected_Doctor']."</td>
                         <td>".$result['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                         <td>".$result['Clinic_Appointment_Date']."</td>
                         <td>".$result['Clinic_Appointment_Time']."</td>    
                         <td>&nbsp;Appointment Cannot Be Deleted</td>
               ";
                    
                  }elseif($result['Clinic_Appointment_Date']>=$todayDate){
               
                     echo "  
                          <tr class='data'>  
                          <td >".$i++."</td>  
                               <td>".$result['Clinic_Appointment_Name']."</td>  
                               <td>".$result['Clinic_Appointment_Identity_Credential']."</td> 
                               <td>".$result['Clinic_Appointment_Email']."</td>  
                               <td>".$result['Clinic_Appointment_Phone']."</td>  
                               <td>".$result['Clinic_Appointment_Speciality']."</td>
                               <td>".$result['Clinic_Appointment_Case_Type']."</td>
                               <td>".$result['Clinic_Appointment_Selected_Doctor']."</td>
                               <td>".$result['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                               <td>".$result['Clinic_Appointment_Date']."</td>
                               <td>".$result['Clinic_Appointment_Time']."</td>    
                               <td>
                     ";?>
                              <form  id="deleteForm" action="(CA) MS_Full_Appointment_List_Delete.php" method="POST">
                               &nbsp;
                              
                              <input type="hidden" id="Clinic_Appointment_Identity_Credential" name="Clinic_Appointment_Identity_Credential" value="<?php echo"".$result['Clinic_Appointment_Identity_Credential']."";?>">
                              <input type="hidden" id="Clinic_Appointment_Date" name="Clinic_Appointment_Date" value="<?php echo"".$result['Clinic_Appointment_Date']."";?>">
                              <input type="hidden" id="Clinic_Appointment_Speciality" name="Clinic_Appointment_Speciality" value="<?php echo"".$result['Clinic_Appointment_Speciality']."";?>">
                              
                              <button type="submit" name="delete" class="delete" style="height:30px;width:100px;" onclick="confirmDelete(event)">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                              </svg>
                              <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;">&nbsp;Delete</span>
                            </button>

                             </form>
                             </td> 
                               </tr>  

<?php
}  }
 }
                else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No Record Found</b></span>";}

}else if(isset($_GET['searchPatient'])){   

  $Clinic_Appointment_Identity_Credential= $_GET['Clinic_Appointment_Identity_Credential'];
 //Display search iteams
 $searchPatient = "SELECT * FROM clinic_appointment WHERE Clinic_Appointment_Identity_Credential like'%$Clinic_Appointment_Identity_Credential%' AND Doctor_Diagnosis_Status!='DONE' && Clinic_Appointment_Acceptance!='REJECTED' order by Clinic_Appointment_Date asc"; 
 $run1 = mysqli_query($conn,$searchPatient); 
     $i=1;  
          if ($num = mysqli_num_rows($run1)>0) {  
               while ($patient= mysqli_fetch_assoc($run1)) { 
                if($patient['Patient_CheckIn_Status'] =='Checked_In' && $patient['Clinic_Appointment_Date']>=$todayDate) {
                  echo "  
                  <tr class='data'>  
                  <td >".$i++."</td>  
                       <td>".$patient['Clinic_Appointment_Name']."</td>  
                       <td>".$patient['Clinic_Appointment_Identity_Credential']."</td> 
                       <td>".$patient['Clinic_Appointment_Email']."</td>  
                       <td>".$patient['Clinic_Appointment_Phone']."</td>  
                       <td>".$patient['Clinic_Appointment_Speciality']."</td>
                       <td>".$patient['Clinic_Appointment_Case_Type']."</td>
                       <td>".$patient['Clinic_Appointment_Selected_Doctor']."</td>
                       <td>".$patient['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                       <td>".$patient['Clinic_Appointment_Date']."</td>
                       <td>".$patient['Clinic_Appointment_Time']."</td>    
                       <td>&nbsp;Appointment Cannot Be Deleted</td>
             ";
                  
                }elseif($patient['Clinic_Appointment_Date']>=$todayDate){
              
                    echo "  
                         <tr class='data'>  
                         <td >".$i++."</td>  
                              <td>".$patient['Clinic_Appointment_Name']."</td>  
                              <td>".$patient['Clinic_Appointment_Identity_Credential']."</td> 
                              <td>".$patient['Clinic_Appointment_Email']."</td>  
                              <td>".$patient['Clinic_Appointment_Phone']."</td>  
                              <td>".$patient['Clinic_Appointment_Speciality']."</td>
                              <td>".$patient['Clinic_Appointment_Case_Type']."</td>
                              <td>".$patient['Clinic_Appointment_Selected_Doctor']."</td>
                              <td>".$patient['Clinic_Appointment_Reason_Of_Appointment']."</td>  
                              <td>".$patient['Clinic_Appointment_Date']."</td>
                              <td>".$patient['Clinic_Appointment_Time']."</td>    
                              <td>
                    ";?>
                             <form id="deleteForm" action="(CA) MS_Full_Appointment_List_Delete.php" method="POST">
                              &nbsp;
                             
                             <input type="hidden" id="Clinic_Appointment_Identity_Credential" name="Clinic_Appointment_Identity_Credential" value="<?php echo"".$result['Clinic_Appointment_Identity_Credential']."";?>">
                             <input type="hidden" id="Clinic_Appointment_Date" name="Clinic_Appointment_Date" value="<?php echo"".$result['Clinic_Appointment_Date']."";?>">
                             <input type="hidden" id="Clinic_Appointment_Speciality" name="Clinic_Appointment_Speciality" value="<?php echo"".$result['Clinic_Appointment_Speciality']."";?>">
                             
                             <button type="submit" name="delete" class="delete" style="height:30px;width:100px;" onclick="confirmDelete(event)">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                              </svg>
                              <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;">&nbsp;Delete</span>
                            </button>
                            </form>
                            </td> 
                              </tr>  

<?php }}}}
 ?>

  
 
</body>
</html>

<script>
function confirmDelete(event) {
  var result = confirm("Are you sure you want to delete this appointment?");
  if (!result) {
    // User clicked "Cancel," prevent the form from being submitted
    event.preventDefault();
  }
}
</script>