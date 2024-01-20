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

    .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }
  /* Table Spacing*/
  .table {
  border-spacing: 100px;
  }

/*Background of the form*/
.content {
  padding: 0 18px;
  background-color: #a3c2c2;
}

/*Focus */
    input[type="date"]:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;
    }


.space{
  height:60px;
}

.btn{
   background:#007BFF;
   color:white;
   font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size:20px;
    height:40px;
    padding-top: 2px;
    border-radius: 5px;
    width:150px;
    cursor: pointer;
    text-decoration:none;
    text-align: center;
    border: 1px solid #007BFF;


  }

  .btn:hover{
    border: 1px solid black;
    color:black;
    background:#007BFF;

  }

  .btnGrey{
   color:#a6a6a6;
   font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
    font-size:20px;
    height:40px;
    padding-top: 2px;
    border-radius: 5px;
    width:150px;
    cursor: pointer;
    text-decoration:none;
    text-align: center;
    border: 1px solid #a6a6a6;


  }

  .btnGrey:hover{
    text-decoration: none;
  color:#a6a6a6;

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
<body class="body">
<br>
<br>
  <br>
  <br>


<!--Doctor Check In Form-->
<div class="centered">
<div class="space">
</div>
<br>

<div class="content">
  <br>

  <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" width="600px">
<br>

<?php
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
session_start();
$email=$_SESSION['email'];

//Check whether doctor checked in or not
$queryCheck = "SELECT * FROM doctor where Doctor_Email='$email'";
$runCheck = mysqli_query($conn, $queryCheck); 
$resultCheck = mysqli_fetch_assoc($runCheck);

$DoctorCheckInStatus= $resultCheck['Doctor_Check_In_Status'];


/*Check in date time */
date_default_timezone_set("Asia/Kuala_Lumpur");
$todayDate = date("Y-m-d");
$CheckInDateTime = date("Y-m-d h:i:sa");


// For daily auto update check in status purpose
//Retrieve only health record date
$lastCheckInDateTime= "".$resultCheck['Doctor_Check_In_DateTime']."";

// Convert the datetime string to a Unix timestamp
$timestamp = strtotime($lastCheckInDateTime);

// Format the timestamp to display only the date
$lastCheckInDate = date('Y-m-d', $timestamp); 



if($lastCheckInDate < $todayDate){
    //Automatically Update to Not Check In daily
    $queryUpdate = "UPDATE doctor SET Doctor_Check_In_Status='Not Checked In' WHERE Doctor_Email='$email'";  
    $runUpdate = mysqli_query($conn,$queryUpdate);

}


if($DoctorCheckInStatus= $resultCheck['Doctor_Check_In_Status'] ==('Not Checked In')){
?>

    <!--Not Yet Check In-->
      <table  width="600px">
    <tr>
    <div class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;height:50px;">Please check in yourself&nbsp;</span>
    <image src="images/attendance.png" >
</div>
    </tr>
      </table>
<br>

 
  <div class=headerCentered>
  <button type="submit" class="btn" name="CheckIn" id="CheckIn" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Check In</button>
</div>
<br>
<?php } elseif($DoctorCheckInStatus= $resultCheck['Doctor_Check_In_Status'] ==('Checked In')){?>
        <!--Content-->
        <table  width="600px">
    <tr>
    <div class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:18px;height:50px;">You have checked in yourself&nbsp;</span>
    <image src="images/attendanceDone.png" >
</div>
    </tr>
      </table>
<br>

 
  <div class=headerCentered>
  <button type="submit" class="btnGrey" name="CheckIn" id="CheckIn" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;" disabled>Check In</button>
</div>
<br>

    <?php }?>

</div>
</form>

<br>
<br>



</div>

</body>
</html>


<?php

/*Change time zone to Malaysia time zone and get current date */
date_default_timezone_set("Asia/Kuala_Lumpur");
$CheckInDateTime = date("Y-m-d h:i:sa");

if (isset($_POST['CheckIn'])) {  
$query = "UPDATE doctor SET Doctor_Check_In_Status='Checked In' , Doctor_Check_In_DateTime=('$CheckInDateTime') WHERE Doctor_Email='$email'";  
$run = mysqli_query($conn,$query);  
if ($run) {  
echo("<script> alert('Checked In Successfully.'); window.location.href='(CA) Doctor_DailyCheckIn.php'; </script>"); 
}else{  
echo "Error: ".mysqli_error($conn);  
}  
}  


?>