<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="(HR) print.css" media="print">

  
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

  /*Print pdf use */
  .pdfPrintheader{
  display: none;
    text-align: center;
    background: white;
    height:30%;
    padding-top: 30px;}

    .pdfDisplay{
      display: none;
    }
    .pdfcommentcontent{
  background-color:#eff5f5;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 18px;
  border:30px solid white;
  border-bottom: 0ch;
  border-top: 0ch;
 
}

.pdfcommentHeader{
  background-color:#eff5f5;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;  
  font-size: 20px;
  border:30px solid white;
  border-bottom: 0ch;
  border-top: 0ch;

}

.pdftablecontent{
  padding: 0 18px;
  background-color:#d0e1e1 ;
  font-size: 20px;
  border: 1px solid black;
  width:1040px;
}




</style>

<!--Nav Bar-->
<?php

  $Title='Health Record';
  echo"<div id='navbar'>";
  include_once("(1) NavBar(Patient).php"); 
  echo"</div>";
?>

</head>
<body class="body">

</style>

 <!--Header-->
 <div class="pdfPrintheader" id="pdfPrintheader">
    <div><image src="images/Slogan1.png" size></div>
</div>

<div class="centered">

<!--Patient Health Record View Without adding comment-->
<br>
<br>
  <br>
<header>
<div class="content" >
  <br>

  <form id="form" action="" method="post"  >
  <header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Health Record</b></span>
  </header>
        <br><br>
  
      
<?php
//pdf use

echo"<div class='pdfDisplay' id='pdfDisplay'>";

/*Store info into session */
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
$email=$_SESSION['email'];


//retrieve patient info
$query = "SELECT * from clinic_appointment WHERE Clinic_Appointment_Email='$email' ";  
$run = mysqli_query($conn,$query);  
$result = mysqli_fetch_assoc($run);  

if ($ca = mysqli_num_rows($run)>0) { 
  //Patient
  echo"
  <table style=width='1000px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;' class='pdftablecontent' id='pdftablecontent'>
  <thead>
  <tr class='boarder'>
<th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Name :  ".$result['Clinic_Appointment_Name']."</th>  
<th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; IC/Passport : ".$result['Clinic_Appointment_Identity_Credential']."</th> 
<th class='boarder' style='width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Gender : ".$result['Patient_Gender']."</th> 
<th class='boarder' style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; Date Of Birth : ".$result['Patient_Birthdate']."</th>
</tr> 
<tr ><th  class='boarder' colspan='4' style='width:100%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; height:50px; text-align: center;'><center>Medical Summary</center></th></tr>
</thead>
</table>
";}else{

//retrieve patient info
$query2 = "SELECT * from um_community WHERE UM_Community_Email='$email' ";  
$run2 = mysqli_query($conn,$query2);  
$result2 = mysqli_fetch_assoc($run2);  

 //Patient
 echo"
 <table style=width='1000px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;' class='pdftablecontent' id='pdftablecontent'>
 <thead>
 <tr class='boarder'>
<th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Name :  ".$result2['UM_Community_FullName']."</th>  
<th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; IC/Passport : ".$result2['UM_Community_IC']."</th> 
<th class='boarder' style='width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Gender : ".$result2['UM_Community_Gender']."</th> 
<th class='boarder' style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; Date Of Birth : ".$result2['UM_Community_Birthdate']."</th>
</tr> 
<tr ><th  class='boarder' colspan='4' style='width:100%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; height:50px; text-align:center'><center>Medical Summary</center></th></tr>
</thead> </table>     ";


}


  //retrieve the selected results from database   
  $query1 = "SELECT Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department,  Health_Record_Advice,Health_Record_Created_DateTime,Health_Record_Diagnosis
  FROM clinic_appointment
  JOIN doctor on Room_Assignation_Doctor_ID= doctor_id
  JOIN health_record on clinic_appointment_id= Clinic_Appointment
  WHERE Clinic_Appointment_Email ='$email'
  GROUP BY Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department, Room_Assignation_Doctor_ID, Health_Record_Advice,Health_Record_Created_DateTime,Health_Record_Diagnosis
  Order BY Health_Record_Created_DateTime desc";
  $result1 = mysqli_query($conn, $query1); 


  
  $resultFirst = mysqli_query($conn, $query1); 
  $rowFirst = mysqli_fetch_array($resultFirst);
  
  // Check if $rowFirst is not null before trying to access its elements
  if ($rowFirst) {
      //To retrieve first health record date
      $datetimeStringFirst = $rowFirst['Health_Record_Created_DateTime'];
      $datetimeFirst = new DateTime($datetimeStringFirst);
      $dateOnlyFirst = $datetimeFirst->format('Y-m-d');
  } else {
      // Handle the case where $rowFirst is null (no records found)
      $dateOnlyFirst = null; // Set a default value or handle accordingly
  }

     if ($num = mysqli_num_rows($result1)>0) {  
      while ($row = mysqli_fetch_array($result1)) { 
        //To retrieve health record of the same date
        $datetimeString=$row['Health_Record_Created_DateTime'];
        $datetime = new DateTime($datetimeString);
        $dateOnly = $datetime->format('Y-m-d');

        if($dateOnlyFirst==$dateOnly){
      echo " 
      <br>
      <div style='font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;' class='pdftablecontent'>
      <br>
      <table width='1000px' class='tablecontent' >
      <tr class='pdfcommentcontent' id='pdfcommentcontent'>
             <th style='width:33%;';><br> Doctor Name :  ".$row['Doctor_Name']."</th>  
             <th  style='width:33%;';><br> Department: ".$row['Doctor_Department']."</th> 
             <th colspan='2' style='width:34%;text-align:right;';><br> created on : ".$row['Health_Record_Created_DateTime']."</th> 
        </tr> 
  
        <tr class='pdfcommentHeader' id='pdfcommentHeader' style='height:50px; '>
             <td colspan='4' style='width:50%;'><br> <b>Diagnosis Result:</b></td> 
        </tr> 
        <tr class='pdfcommentcontent' id='pdfcommentcontent' style='height:50px;'>
             <td colspan='4' style='width:50%;'> ".nl2br(htmlspecialchars($row['Health_Record_Diagnosis']))."<br><br></td> 
        </tr>
        </tr> 
        <tr class='pdfcommentHeader' id='pdfcommentHeader' style='height:50px;'>
             <td  colspan='4' style='width:50%;'><b>Advices:</b></td> 
        </tr> 
        <tr class='pdfcommentcontent' id='pdfcommentcontent' style='height:50px;'>
             <td  colspan='4' style='width:50%;'>".nl2br(htmlspecialchars($row['Health_Record_Advice']))."<br></td> 
        </tr>
        <tr style='height:20px;'></tr>  </table></div> <br>
  ";}else{continue;}
      }
}else{
echo  "
<div style='font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;' class='pdftablecontent'>
<table width='1000px' class='tablecontent'>
<tr style='height:20px;background-color:#eff5f5;'></tr> 
<tr><td><span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No Health Record History</b></span></td></tr>
<tr style='height:20px;background-color:#eff5f5;'></tr> </table><br> </div>

";

}
echo"</div>";

?>


<?php  /*Store info into session */
              $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
              $email=$_SESSION['email'];
        
        
              //retrieve patient info
              $query = "SELECT * from clinic_appointment WHERE Clinic_Appointment_Email='$email' ";  
              $run = mysqli_query($conn,$query);  
              $result = mysqli_fetch_assoc($run);  
              
              if ($ca = mysqli_num_rows($run)>0) { 
                //Patient
                echo"
                <table width='1000px' class='tablecontent' id='tablecontent'>
                <thead>
                <tr class='boarder'>
           <th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Name :  ".$result['Clinic_Appointment_Name']."</th>  
           <th class='boarder' style='width:25%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; IC/Passport : ".$result['Clinic_Appointment_Identity_Credential']."</th> 
           <th class='boarder' style='width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Gender : ".$result['Patient_Gender']."</th> 
           <th class='boarder' style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; Date Of Birth : ".$result['Patient_Birthdate']."</th>
      </tr> 
      <tr ><th  class='boarder' colspan='4' style='width:100%;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; height:50px; text-align: center;'><center>Medical Summary</center></th></tr>
  </thead>
  </table>
 ";}else{

              //retrieve patient info
              $query2 = "SELECT * from um_community WHERE UM_Community_Email='$email' ";  
              $run2 = mysqli_query($conn,$query2);  
              $result2 = mysqli_fetch_assoc($run2);  

               //Patient
               echo"
               <table width='1000px' class='tablecontent' id='tablecontent'>
               <thead>
               <tr class='boarder'>
          <th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Name :  ".$result2['UM_Community_FullName']."</th>  
          <th class='boarder' style='width:25%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; IC/Passport : ".$result2['UM_Community_IC']."</th> 
          <th class='boarder' style='width:20%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'>&nbsp; Gender : ".$result2['UM_Community_Gender']."</th> 
          <th class='boarder' style='width:30%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; '>&nbsp; Date Of Birth : ".$result2['UM_Community_Birthdate']."</th>
     </tr> 
     <tr ><th  class='boarder' colspan='4' style='width:100%;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; height:50px; text-align:center'><center>Medical Summary</center></th></tr>
 </thead> </table>     ";


 }
  ?>


    <?php   
      //show health record  
  
        //retrieve the selected results from database   
        $query1 = "SELECT Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department,  Health_Record_Advice,Health_Record_Created_DateTime,Health_Record_Diagnosis
        FROM clinic_appointment
        JOIN doctor on Room_Assignation_Doctor_ID= doctor_id
        JOIN health_record on clinic_appointment_id= Clinic_Appointment
        WHERE Clinic_Appointment_Email ='$email'
        GROUP BY Clinic_Appointment_Identity_Credential,Doctor_Name, Doctor_Department, Room_Assignation_Doctor_ID, Health_Record_Advice,Health_Record_Created_DateTime,Health_Record_Diagnosis
        Order BY Health_Record_Created_DateTime desc";
        $result1 = mysqli_query($conn, $query1); 

        $resultFirst = mysqli_query($conn, $query1); 
        $rowFirst = mysqli_fetch_array($resultFirst);
        
        // Check if $rowFirst is not null before trying to access its elements
        if ($rowFirst) {
            //To retrieve first health record date
            $datetimeStringFirst = $rowFirst['Health_Record_Created_DateTime'];
            $datetimeFirst = new DateTime($datetimeStringFirst);
            $dateOnlyFirst = $datetimeFirst->format('Y-m-d');
        } else {
            // Handle the case where $rowFirst is null (no records found)
            $dateOnlyFirst = null; // Set a default value or handle accordingly
        }
        
        if ($num = mysqli_num_rows($result1) > 0) {  
            while ($row = mysqli_fetch_array($result1)) { 
                //To retrieve health record of the same date
                $datetimeString = $row['Health_Record_Created_DateTime'];
                $datetime = new DateTime($datetimeString);
                $dateOnly = $datetime->format('Y-m-d');
        
                // Check if $dateOnlyFirst is not null before using it in comparison
                if ($dateOnlyFirst && $dateOnlyFirst == $dateOnly) {
            echo "   
            <table width='1000px' class='tablecontent'>
            <tr class='commentcontent' id='commentcontent'>
                   <th style='width:33%;';><br> Doctor Name :  ".$row['Doctor_Name']."</th>  
                   <th  style='width:33%;';><br> Department: ".$row['Doctor_Department']."</th> 
                   <th colspan='2' style='width:34%;text-align:right;';><br> created on : ".$row['Health_Record_Created_DateTime']."</th> 
              </tr> 
        
              <tr class='commentHeader' id='commentHeader' style='height:50px; '>
                   <td colspan='4' style='width:50%;'><br> <b>Diagnosis Result:</b></td> 
              </tr> 
              <tr class='commentcontent' id='commentcontent' style='height:50px;'>
                   <td colspan='4' style='width:50%;'> ".nl2br(htmlspecialchars($row['Health_Record_Diagnosis']))."<br><br></td> 
              </tr>
              </tr> 
              <tr class='commentHeader' id='commentHeader' style='height:50px;'>
                   <td  colspan='4' style='width:50%;'><b>Advices:</b></td> 
              </tr> 
              <tr class='commentcontent' id='commentcontent' style='height:50px;'>
                   <td  colspan='4' style='width:50%;'>".nl2br(htmlspecialchars($row['Health_Record_Advice']))."<br></td> 
              </tr>
                </table><br>
        ";}else{continue;}
            }
      }else{
echo  "
<table width='1000px' class='tablecontent' id='tablecontent'>
<tr style='height:20px;background-color:#eff5f5;'></tr> 
<tr><td><span style=\"color:#669999;font-size:20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b>No Health Record History</b></span></td></tr>
<tr style='height:20px;background-color:#eff5f5;'></tr> </table><br>

";

}

?>



<br>
</form>

<div class="text-center">
        <button onclick="window.print();" class="btn" id="print-btn" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Print</button>
      </div>

      <br>
</div>
</div>

</body>
</html>
