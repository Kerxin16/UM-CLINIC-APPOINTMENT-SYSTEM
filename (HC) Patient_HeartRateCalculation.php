<?php
  $Title='Health Check';
  include_once("(1) NavBar(Patient).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email']; 
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
     

 
  /*Background of the form*/
  .content {
   padding: 0 18px;
   background-color: #a3c2c2;
   width:1000px;

   }

     /*Header Center Text*/
     .headerCentered {
     text-align: center;
     position: relative;
     font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

  
 /* Button Centered*/
 .buttonCentered {
    text-align: center;
    position: relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }

/*Button */

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

/*text */
.text{
    font-size: 18px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }



</style>
</head>
<body class="body">
<div class="centered">
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <form class=content action="(HC) Patient_HeartRateBack.php" method="post">
    <br>
    <header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Normal Heart Rate Result</b></span>
  </header>      <br>
<br>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST["age"];
    $HeartRate = $_POST["heartrate"];
    // Calculate the normal heart rate range (during exercise)
    $max_heart_rate = 220 - $age;
    $min_normal_heart_rate = 0.7 * $max_heart_rate;
    $max_normal_heart_rate = 0.85 * $max_heart_rate;

    // Calculate the normal heart rate range (during rest for adult)
    $min_rest_heart_rate = 60+($age/2);
    $max_rest_heart_rate = 100+($age/2);

    $result="";
if ($HeartRate >= $min_rest_heart_rate && $HeartRate <= $max_rest_heart_rate) {
    $result="<span class='text'> Age: " . $age . " years</span><br>
    <span class='text'> " . $HeartRate . " beats per minute (during rest). Heart rate is in normal range</span><br><br>
    <span class='text'><b>Recommended Normal Heart Rate Range (during rest):</b><br>" . $min_rest_heart_rate . " - " . $max_rest_heart_rate . " beats per minute</span><br><br>
    <span class='text'><b>Recommended Normal Heart Rate Range (during exercise): </b><br> " . $min_normal_heart_rate . " - " . $max_normal_heart_rate . " beats per minute </span>
    ";
}
elseif($HeartRate <= $min_rest_heart_rate || $HeartRate >= $max_rest_heart_rate){
    $result="<span class='text' style='color:#e60000;'> Age: " . $age . " years</span><br>
    <span class='text' style='color:#e60000;'> " . $HeartRate . " beats per minute (during rest). Heart rate not in normal range</span><br><br>
    <span class='text'><b>Recommended Normal Heart Rate Range (during rest): </b><br>" . $min_rest_heart_rate . " - " . $max_rest_heart_rate . " beats per minute </span><br><br>
    <span class='text'><b>Recommended Normal Heart Rate Range (during exercise):</b><br>" . $min_normal_heart_rate . " - " . $max_normal_heart_rate . " beats per minute</span>
    ";
}
echo"$result";
}


/*Insert Patient Info Into Database */

 /*Change time zone to Malaysia time zone and get current date */
 date_default_timezone_set("Asia/Kuala_Lumpur");
 $todayDate= date("Y-m-d"); 
 $DateTime = date("Y-m-d h:i:sa");


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{

$sql = "INSERT INTO heartrate (Normal_Heart_Rate,HealthCheck_Email,HealthCheck_DateTime)
values ('$HeartRate','$email','$DateTime')";

if ($conn->query($sql)){
   
 }
 else{
 
 echo "Error: ". $sql ."
 ". $conn->error;
 }

$conn->close();

}
?>
<br>
<br>
  <!--Button-->
<div class=buttonCentered>
<input type="submit" class="btn" name="back" value="Back" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size:21px;border-radius:100px;"></input>
</div>
<br>

</form>
</div>

</body>
</html>