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
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    
}



</style>
</head>
<body class="body">
<div class="centered">
<br>
    
    <br>
    <br><br><br><br>
    <form class=content action="(HC) Patient_BMIBack.php" method="post">
    <br>
    <header class=headerCentered>
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:30px;"> <b>Body Mass Index Result</b></span>
  </header>    <br>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST["weight"];
        $height = $_POST["height"];

        // Calculate BMI
        $bmi = $weight / ($height * $height);

        $result = "";
        if ($bmi < 18.5) {
            $result = "<span  style='color:#e60000;font-size: 18px;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'> Your BMI is " . number_format($bmi, 2) . " <br> Result: Underweight <br><br><br></span>
            <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
            <span class='text'> 
            1. <b>Eat Nutrient-Dense Foods:</b>
            Focus on consuming foods that are rich in nutrients rather than empty calories. Include a variety of fruits, vegetables, lean proteins, whole grains, and healthy fats in your diet.
            
            <br><br>

            2. <b>Increase Caloric Intake: </b>
            To gain weight, you need to consume more calories than your body burns. However, it's important to do this in a healthy way. Aim for a gradual increase in calorie intake to avoid rapid weight gain, which can be unhealthy.
            
            <br><br>

            3. <b> Eat Regularly: </b>
            Instead of having three large meals a day, consider eating smaller, more frequent meals and snacks. This can help you consume more calories throughout the day.

            <br>
            </span>
            
            ";


        } elseif ($bmi >= 18.5 && $bmi < 24.9) {    
            $result = "<span  style='  font-size: 18px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'> Your BMI is " . number_format($bmi, 2) . " <br> Result: Normal Weight <br><br><br></span>
            <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
            <span class='text'> 
            1. <b>Balanced Diet:</b>
            Continue to eat a balanced diet that includes a variety of fruits, vegetables, whole grains, lean proteins, and healthy fats. Pay attention to portion sizes to ensure you're getting the nutrients your body needs without overeating.            
            <br><br>

            2. <b>Regular Exercise: </b>
            Engage in regular physical activity. This could include a mix of cardiovascular exercises (e.g., walking, jogging, swimming) and strength training. Aim for at least 150 minutes of moderate-intensity exercise per week, along with muscle-strengthening activities on two or more days a week.            
            <br><br>

            3. <b>Stay Hydrated:</b>
            Drink an adequate amount of water throughout the day to stay hydrated. Water is essential for various bodily functions, including digestion, temperature regulation, and nutrient transport.
            <br>
            </span>
            
            ";

        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $result = "<span  style='color:#e60000;  font-size: 18px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'> Your BMI is " . number_format($bmi, 2) . " <br> Result: Overweight <br><br><br></span>
            <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
            <span class='text'> 
            1. <b>Healthy Eating Habits:</b>
            Focus on a balanced and nutritious diet that includes plenty of fruits, vegetables, whole grains, lean proteins, and healthy fats. Be mindful of portion sizes to avoid overeating.
            <br><br>

            2. <b>Portion Control: </b>
            Be conscious of portion sizes. Using smaller plates and bowls can help with portion control, and paying attention to hunger and fullness cues can prevent overeating.
            <br><br>

            3. <b>Reduce Sugary and Processed Foods:</b>
            Limit the intake of sugary snacks, sweets, and processed foods. These often contribute excess calories without providing essential nutrients.
            <br>
            </span>
            
            ";

        } else {

            $result = "<span  style=' color:#e60000;  font-size: 18px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'> Your BMI is " . number_format($bmi, 2) . " <br> Result: Obese <br><br><br></span>
            <span style='font-size: 20px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;'><b>Advices:</b> <br> <br> </span>
            <span class='text'> 
            1. <b>Choose Whole Foods:</b>
            Opt for whole, unprocessed foods over processed and packaged options. Whole foods provide more nutrients and can help with satiety.
            <br><br>

            2. <b>Regular Exercise:</b>
            Engage in regular physical activity. Aim for at least 150 minutes of moderate-intensity aerobic exercise per week, along with strength training exercises at least two days a week. Gradually increase the intensity and duration of your workouts.
            <br><br>

            3. <b>Behavioral Changes:</b>
            Consider seeking support for behavioral changes related to eating habits. This may involve working with a registered dietitian, therapist, or counselor to address emotional and psychological aspects of overeating.
            <br>
            </span>
            
            ";

        }

        echo $result;
    }


/*Insert Patient Info Into Database */

 /*Change time zone to Malaysia time zone and get current date */
 date_default_timezone_set("Asia/Kuala_Lumpur");
 $todayDate= date("Y-m-d"); 
 $DateTime = date("Y-m-d h:i:sa");

 $formatedBMI=number_format($bmi, 2);


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{

$sql = "INSERT INTO bmi(BMI,HealthCheck_Email,HealthCheck_DateTime)
values ('$formatedBMI','$email','$DateTime')";

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


