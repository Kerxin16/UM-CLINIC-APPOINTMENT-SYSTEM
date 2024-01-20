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
     font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;   }

  
   /* Button Centered*/
   .buttonCentered {
    text-align: center;
    position: relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}

/*Button */

.btn{
   background:#669999;
    color:black;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    font-size:20px;
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
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}



</style>
</head>
<body class="body">
<div class="centered">
<br>

    <br>
    <br>
    <br>
    <br><br>
    <form class=content action="(HC) Patient_BloodPressureBack.php" method="post">
    <br>
    <header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Blood Pressure Result</b></span>
  </header> 
    <br>
    <br>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $systolic = $_POST["systolic"];
    $diastolic = $_POST["diastolic"];



    // Check for hypertension (high blood pressure)
    if ($systolic <= 90 || $diastolic <= 60) {
        $result="<span class='text' style='color:#e60000;' > Systolic Pressure: " . $systolic . " mmHg <br>
        Diastolic Pressure: " . $diastolic . " mmHg<br>
        Result: Low Blood Pressure <br><br><br></span>
        <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
        <span class='text'> 
        1. <b>Increase Salt Intake:</b>
        Adding a bit more salt to your diet can help raise blood pressure. However, it's essential to consult with a healthcare professional before making significant changes, especially if you have other health conditions.
        <br><br>

        2. <b>Stay Hydrated:</b>
        Dehydration can contribute to low blood pressure. Ensure you drink an adequate amount of water throughout the day. Aim for at least 8 glasses of water daily, and more if you're physically active.
        <br><br>

        3. <b>Small, Frequent Meals:</b>
        Eating smaller, more frequent meals throughout the day can help prevent a sudden drop in blood pressure after meals. Avoid large, heavy meals.
        <br>
        </span>

        ";


    } elseif (($systolic >= 90 && $systolic <= 120  )||( $diastolic >= 60 &&$diastolic <= 80)) {
        $result="<span class='text' > Systolic Pressure: " . $systolic . " mmHg <br>
        Diastolic Pressure: " . $diastolic . " mmHg<br>
        Result: Normal Blood Pressure<br><br><br></span>

        <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
        <span class='text'> 

        1. <b>Eat a Balanced Diet:</b>
        Consume a diet rich in fruits, vegetables, whole grains, lean proteins, and healthy fats. The Dietary Approaches to Stop Hypertension (DASH) diet is often recommended for its positive impact on blood pressure.
        <br><br>

        2. <b>Manage Stress:</b>
        Find healthy ways to manage stress, such as meditation, deep breathing exercises, yoga, or engaging in hobbies. Chronic stress can contribute to high blood pressure.
        <br><br>

        3. <b>Adequate Sleep:</b>
        Ensure you get enough quality sleep each night. Lack of sleep can negatively impact blood pressure. Aim for 7-9 hours of sleep per night.
        <br>
        </span>
        ";

    }
    elseif (($systolic >= 120 && $systolic <= 140  )||( $diastolic >= 80 &&$diastolic <= 90)){
        $result="<span class='text' style='color:#e60000;' > Systolic Pressure: " . $systolic . " mmHg <br>
        Diastolic Pressure: " . $diastolic . " mmHg<br>
        Result: You Have Risk Of Developing High Blood Pressure<br><br><br></span>

        <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
        <span class='text'> 

        1. <b>Maintain a Healthy Weight:</b>
        Losing excess weight, even a small amount, can have a significant impact on blood pressure. It is essential to work with a healthcare professional to set realistic weight loss goals.
        <br><br>

        2. <b>Regular Physical Activity:</b>
        Engage in regular aerobic exercise, such as brisk walking, swimming, or cycling, for at least 150 minutes per week. Consult your healthcare provider before starting a new exercise program.
        <br><br>

        3. <b>Limit Alcohol Consumption:</b>
        If you drink alcohol, do so in moderation. Moderate drinking is generally defined as up to one drink per day for women and up to two drinks per day for men.
        <br>
        </span>";

    } elseif(($systolic >= 140 )||( $diastolic >= 90)){

        $result="<span class='text' style='color:#e60000;' > Systolic Pressure: " . $systolic . " mmHg <br>
        Diastolic Pressure: " . $diastolic . " mmHg<br>
        Result: High Blood Pressure<br><br><br></span>

        <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
        <span class='text'> 

        1. <b>Medication Adherence:</b>
        If prescribed medication for high blood pressure, it's crucial to take it exactly as directed by the healthcare provider. Skipping doses or stopping medication without consulting a healthcare professional can lead to uncontrolled hypertension.
        <br><br>

        2. <b>Healthy Diet:</b>
        Adopt a heart-healthy diet, such as the DASH (Dietary Approaches to Stop Hypertension) diet. This includes:
        <br> - Eating plenty of fruits and vegetables.
        <br> - Choosing whole grains over refined grains.
        <br> - Opting for lean proteins, such as poultry, fish, and legumes.
        <br> - Limiting sodium (salt) intake.
        <br><br>

        3. <b>Reduce Stress:</b>
        Practice stress-reducing techniques such as deep breathing, meditation, yoga, or progressive muscle relaxation. Chronic stress can contribute to high blood pressure.
        <br>
        </span>";
    }

    echo $result;
 }
?>


<?php


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

$sql = "INSERT INTO bloodPressure (Systolic_Pressure,Diastolic_Pressure,HealthCheck_Email,HealthCheck_DateTime)
values ('$systolic','$diastolic','$email','$DateTime')";

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
<input type="submit" class="btn" name="back" value="Back" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius:100px;"></input>
</div>
<br>
</form>
</div>

</body>
</html>