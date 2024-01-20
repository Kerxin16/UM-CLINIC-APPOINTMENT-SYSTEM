<?php

/*Database Connection*/
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

session_start();
$email="".$_SESSION['email']."";
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
th,tr,td{  
    border:2px solid; 
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
    font-size: 16px;
  height:30px;
    }

    table{
      border-collapse: collapse;
  border-spacing: 0;
    }
  
    /*Link Color */
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



<br>

  <br>

<table  style="width:100%">  
<thead>
      <tr >
      <th style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">No</th>  
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Name</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Identity Credential</th> 
           <th style="width:15%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Department</th>  
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Date</th>    
           <th style="width:10%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Check In</th>
      </tr> 
  </thead>
  <tbody>
      <?php  
      date_default_timezone_set("Asia/Kuala_Lumpur");
      $todayDate=date("Y-m-d"); 

      //PAGINATION
      //define total number of results you want per page  
      $results_per_page = 5;  
      
      //find the total number of results stored in the database  
      $query = "SELECT * FROM clinic_appointment 
      WHERE Doctor_Diagnosis_Status != 'DONE' AND  Clinic_Appointment_Email ='$email' AND Room_Assignation_Status != 'ASSIGNED' AND Patient_CheckIn_Status != 'Checked_In'AND Clinic_Appointment_Date >='$todayDate' order by Clinic_Appointment_Date asc";  
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
      WHERE Doctor_Diagnosis_Status != 'DONE' AND Clinic_Appointment_Acceptance='ACCEPTED' AND Clinic_Appointment_Email ='$email' AND Room_Assignation_Status != 'ASSIGNED' AND Patient_CheckIn_Status != 'Checked_In' AND Clinic_Appointment_Date >='$todayDate' order by Clinic_Appointment_Date asc LIMIT " . $page_first_result . ',' . $results_per_page;  
      $run = mysqli_query($conn,$query); 


     
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) { 
                while ($result = mysqli_fetch_assoc($run)) {

                    echo " 
                          <tr class='data'>  
                          <td >".$i++."</td>  
                               <td>".$result['Clinic_Appointment_Name']."</td>  
                               <td>".$result['Clinic_Appointment_Identity_Credential']."</td>  
                               <td>".$result['Clinic_Appointment_Speciality']."</td>
                               <td>".$result['Clinic_Appointment_Date']."</td>      
                               <td><a class=blue href='(CA) Patient_CheckInConnect.php?Clinic_Appointment_Name=".$result['Clinic_Appointment_Name']."&&Clinic_Appointment_Identity_Credential=".$result['Clinic_Appointment_Identity_Credential']."&& Clinic_Appointment_Speciality=".$result['Clinic_Appointment_Speciality']."&& Clinic_Appointment_Date=".$result['Clinic_Appointment_Date']."' 
                               Clinic_Appointment_Name && Clinic_Appointment_Identity_Credential && Clinic_Appointment_Speciality && Clinic_Appointment_Date='btn' > Check In</a></td> 
                               </tr>  
                            
                     ";  
                  }
 }
                else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No Record Found</b></span>";}


?>
 </tbody></table>
 <?php
                echo"<br><br>";
                //display the link of the pages in URL  
                for($page = 1; $page<= $number_of_page; $page++) {  
                 echo '<a  class="page" href="(CA) Patient_Check_In.php?page='. $page .'">' . $page . '</a> ';
               }  
           
             echo"<br>"

          ?>

 
</body>
</html>