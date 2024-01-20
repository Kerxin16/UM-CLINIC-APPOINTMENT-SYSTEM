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


    /*Font */
    p{
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;      
      font-size: 18px;
    }


   /*Focus */
input[type="text"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;

    }

       /*Input Field*/
       .inputField{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        
        font-size: 16px;
         border-radius: 5px;
         border:1px ;
         height: 40px;
         background-color:  #f0f0f0;
         width:94%;
         
      }



 /*Link */

.btn{
    color:#007BFF;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size: 16px;
    text-decoration:none;
    border: 1px solid #007BFF;
    padding: 8px;
    border-radius: 5px;
    height: 40px;
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

 </style>
</head>


<body class="centered">

<!--Room Assignation-->
    <p style="width:1850px">
        
        <?php 
        /*Today Date */
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $todayDate=date("Y-m-d"); 

           $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
           $query = "SELECT * FROM clinic_appointment WHERE (Patient_CheckIn_Status='Checked_In' AND Room_Assignation_Status='NULL' AND Clinic_Appointment_Date='$todayDate') order by Clinic_Appointment_Time asc ";
            $query_run = mysqli_query($conn, $query);
                  ?>

<table  style="width:100%">  
<thead>
      <tr >
        <th colspan="2"style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">No</th>  
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Name </th>  
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">IC/Passport</th>  
           <th style="width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Appointment Department</th> 
           <th style="width:10%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Type Of Case</th>
           <th style="width:5%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Selected Doctor</th>  
           <th style="width:15%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Reason Of Appointment</th>
           <th style="width:10%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Doctor ID</th> 
           <th style="width:5%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Assign</th>  
 
      </tr> 
  </thead>
      <?php   

      $i=1;  
           if ($num = mysqli_num_rows($query_run)>0) {  
                while ($result = mysqli_fetch_assoc($query_run)) {    
                    echo"<form  action= '(CA) MS_Room_Assignation_C.php' method='post' >
                    "   
            ?>
                                   <tr class='data'>  
                                   <td colspan='2'><?php echo"".$i++." "?><input type='hidden' name='clinic_appointment_id' value="<?php echo"".$result['clinic_appointment_id'].""?>"></td>
                                        <td><?php echo"".$result['Clinic_Appointment_Name'].""?></td>  
                                        <td><?php echo"".$result['Clinic_Appointment_Identity_Credential'].""?></td>
                                        <input type='hidden' name='Clinic_Appointment_Speciality' value="<?php echo"".$result['Clinic_Appointment_Speciality'].""?>"> 
                                        <td><?php echo"".$result['Clinic_Appointment_Speciality'].""?></td>   
                                        <td><?php echo"".$result['Clinic_Appointment_Case_Type'].""?></td>
                                        <td><?php echo"".$result['Clinic_Appointment_Selected_Doctor'].""?></td>      
                                        <td><?php echo"".$result['Clinic_Appointment_Reason_Of_Appointment'].""?></td>  
                                        <td><input type="text" class="inputField" id="doctorID" name="doctorID" placeholder="&nbsp;Enter Doctor ID"></td>
                                        <td>  <button type="submit" class="btn" name="assigned" id="assigned">Assign</button></td>
 
                                 <?php
                                  echo" </tr>  
                                  </form >
                              ";  
            }
 }
              else{echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No New Patient</b></span>";}

          ?>


</table>
</p>

</body>
</html>

