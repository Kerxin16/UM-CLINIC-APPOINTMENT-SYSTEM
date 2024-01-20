<?php   
      $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');

     if (isset($_GET['Clinic_Appointment_Identity_Credential'])&& isset($_GET['Clinic_Appointment_Speciality'])) {  

      $Clinic_Appointment_Identity_Credential=$_GET['Clinic_Appointment_Identity_Credential']; 

      //retrieve patient info
      $query = "SELECT * from clinic_appointment WHERE Clinic_Appointment_Identity_Credential='$Clinic_Appointment_Identity_Credential' ";  
      $run = mysqli_query($conn,$query);  
      $result = mysqli_fetch_assoc($run);

      //retrive health record history
      $query1 = "SELECT Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department,  Health_Record_Advice,Health_Record_Created_DateTime
      FROM clinic_appointment
      JOIN doctor on Room_Assignation_Doctor_ID= doctor_id
      JOIN health_record on clinic_appointment_id= Clinic_Appointment
      WHERE Clinic_Appointment_Identity_Credential ='$Clinic_Appointment_Identity_Credential'
      GROUP BY Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department, Room_Assignation_Doctor_ID, Health_Record_Advice,Health_Record_Created_DateTime
      Order BY Health_Record_Created_DateTime desc;";  
      $run1 = mysqli_query($conn,$query1);  
      $result1 = mysqli_fetch_assoc($run1);

 }  
 ?> 


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
    /*Background Color */
    .body{
      background-color:#c2d6d6;
    }
    /* Make whole document located at center*/
   .centered {
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0%);
      }

      /* Health Record Summary Text*/
    .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }
 
/*Background of the form*/
.content {
  padding: 0 18px;
  background-color: #a3c2c2;
}

/*Table */
.tablecontent{
  padding: 0 18px;
  background-color:#d0e1e1 ;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 20px;
}

.commentcontent{
  background-color:#eff5f5;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 18px;
  border:30px solid #eff5f5;
  border-bottom: 0ch;
  border-top: 0ch;
}

.commentHeader{
  background-color:#eff5f5;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 20px;
  border:30px solid #eff5f5;
  border-bottom: 0ch;
  border-top: 0ch;
}



table,th,tr,td{  
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  }

  .boarder{
    border: 2px solid; 
  }
  


 .whiteboarder{
  border-top-color: white;
 }

 /*TextArea */
 textarea:focus{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;      
  background-color : beige; 
      color: #424b57;
      border-color: white;

    }

 /*button*/

 .btn{
   background:#669999;
    color:black;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size:20px;
    height:40px;
    border-radius: 100px;
    width:150px;
    cursor: pointer;
  }

  .btn:hover{
    background-color: #a8b1bd;
  color: #424b57;

  }

  /*pagination */

.page{
        color:#424b57;
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
</style>

<!--Nav Bar-->
<?php

$Title='Health Record';
  include_once("(1) NavBar(Doctor).php");     
?>

</head>
<body class="body">
<div class="centered">

<!--Patient Health Record View Without adding comment-->
<br>
<br>
  <br>
<header>
<div class="content" >
  <br>

  <form id="form" action="(HR) ClinicHealthRecordBack.php" method="post"  >
  <button type="submit"   class="btn" name="back" id="back" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:20px;border-radius: 100px;cursor: pointer; width:150px;">Back</button>
  <header class=headerCentered>
    <br>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Health Record</b></span>
  </header>
        <br><br>
    <!--Content-->
      <table width="1000px" class=tablecontent>
      <thead>
      <tr class="boarder">
        <?php  /*Store info into session */
      $_SESSION['Clinic_Appointment_Identity_Credential']=$Clinic_Appointment_Identity_Credential;  ?>
           <th class="boarder" style="width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">&nbsp; Name :  <?php echo "".$result['Clinic_Appointment_Name'].""; ?> </th>  
           <th class="boarder" style="width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; ">&nbsp; IC/Passport : <?php echo "".$result['Clinic_Appointment_Identity_Credential'].""; ?></th> 
           <th class="boarder" style="width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">&nbsp; Gender : <?php echo "".$result['Patient_Gender'].""; ?></th> 
           <th class="boarder" style="width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; ">&nbsp; Date Of Birth : <?php echo "".$result['Patient_Birthdate'].""; ?></th>
      </tr> 
      <tr ><th  class="boarder" colspan="4" style="width:100%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  text-align: center;">Medical Summary</th></tr>
  </thead>
  </table>
  <table width="1000px" >
  <tbody>

    <!--show health record history-->
    <?php   
    
    //define total number of results you want per page  
    $results_per_page = 2;  
    $number_of_result = mysqli_num_rows($run1);  

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
      
        //retrieve the selected results from database   
        $query1 = "SELECT Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department,  Health_Record_Advice,Health_Record_Created_DateTime,Health_Record_Diagnosis
        FROM clinic_appointment
        JOIN doctor on Room_Assignation_Doctor_ID= doctor_id
        JOIN health_record on clinic_appointment_id= Clinic_Appointment
        WHERE Clinic_Appointment_Identity_Credential ='$Clinic_Appointment_Identity_Credential'
        GROUP BY Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department, Room_Assignation_Doctor_ID, Health_Record_Advice,Health_Record_Created_DateTime,Health_Record_Diagnosis
        Order BY Health_Record_Created_DateTime desc LIMIT " . $page_first_result . ',' . $results_per_page;  
        $result1 = mysqli_query($conn, $query1);  




           if ($num = mysqli_num_rows($run1)>0) {  
                while ($row = mysqli_fetch_array($result1)) { 
                  echo "   
                  <tr class='commentcontent tablecontent'>
                         <th style='width:33%;';><br> Doctor Name :  ".$row['Doctor_Name']."</th>  
                         <th style='width:33%;';><br> Department: ".$row['Doctor_Department']."</th> 
                         <th colspan='2'  style='width:34%;text-align:right;';><br> created on : ".$row['Health_Record_Created_DateTime']."</th> 
                    </tr> 
              
                    <tr class='commentHeader' style='height:50px; '>
                         <td colspan='4' style='width:50%;'><br> <b>Diagnosis Result:</b></td> 
                    </tr> 
                    <tr class='commentcontent' style='height:50px;'>
                         <td colspan='4' style='width:50%;'> ".nl2br(htmlspecialchars($row['Health_Record_Diagnosis']))."<br><br></td> 
                    </tr>
                    </tr> 
                    <tr class='commentHeader' style='height:50px;'>
                         <td  colspan='4' style='width:50%;'><b>Advices:</b></td> 
                    </tr> 
                    <tr class='commentcontent' style='height:50px;'>
                         <td  colspan='4' style='width:50%;'>".nl2br(htmlspecialchars($row['Health_Record_Advice']))."<br></td> 
                    </tr>
                    <tr style='height:20px;'></tr> 
              ";}}
              ?>
                  </tbody>
</table>
              <?php

              echo"<br><br>";
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
      echo '<a  class="page" href="(HR) HealthRecordHistoryView.php?Clinic_Appointment_Identity_Credential='.$result['Clinic_Appointment_Identity_Credential'].'&& Clinic_Appointment_Speciality='.$result['Clinic_Appointment_Speciality'].'&&page='. $page .'">' . $page . '</a> ';
      
  }  
   
  echo"<br><br>";

?>

<br>

</form>
</div>
</div>

</body>
</html>
