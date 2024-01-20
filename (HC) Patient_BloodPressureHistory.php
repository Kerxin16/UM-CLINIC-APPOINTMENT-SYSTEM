<?php
  $Title='Blood Pressure History';
  session_start();

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
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
      
      /* Health Check Text*/
      .headerCentered {
      text-align: center;
      position: relative;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;    }

      /* Button Right*/
      .buttonRight {
    text-align: center;
    float:right;
    position:relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}

/*Button */
.btn{
  background:#669999;
  cursor: pointer;
  width:100px;
  text-align: center;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}

input[type="submit"]:hover{
      background-color : #c2d6d6; 
      border-color: black;
    }

</style>

<!--Website Name And icon-->
<title><?php echo $Title?> | University Malaya Healthcare</title>
<link rel="icon" href="/images/UniversityOfMalaya.jpg">  
</head>

<body class="body">
<p>
<br>
<form action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="post" >
<div class="buttonRight">
<input type="submit" class="btn" name="back" value="Back" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius:100px;"></input></div>
</form>
<br>
<br>
</p>

<h2 class="headerCentered"><b>Blood Pressure History</b><h2>



<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Query to retrieve data from your table
$sql = "(SELECT HealthCheck_DateTime, Systolic_Pressure,Diastolic_Pressure FROM bloodPressure where HealthCheck_Email='$email'order by HealthCheck_DateTime desc LIMIT 15 )
ORDER BY HealthCheck_DateTime ASC;";
$result = $conn->query($sql);

$data = array();
$data[] = ['HealthCheck_DateTime', 'Systolic Pressure','Diastolic Pressure']; // Add column headers

if ($result->num_rows > 0) {

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="line_chart" style="width: full; height: 800px;"></div>

<?php
    while ($row = $result->fetch_assoc()) {
        $data[] = [$row['HealthCheck_DateTime'], (float)$row['Systolic_Pressure'],(float)$row['Diastolic_Pressure']];
    }


?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

        var options = {
            curveType: 'function', 
            legend: { position: 'right' },
            backgroundColor: '#a3c2c2',
            hAxis: {
                title: 'Date Time',
                textStyle: {
                    fontSize: 14,// Set the font size for the horizontal axis labels
                    fontName: 'Roboto',
                }
            },
            vAxis: {
                title: 'Blood Pressure',
                textStyle: {
                    fontSize: 14, // Set the font size for the vertical axis labels
                    fontName: 'Roboto',
                }
            },
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

        chart.draw(data, options);
    }
</script>

</body>
</html>


<?php 
}else{
    echo "<span style=\"color:#669999;font-size:20px;  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;\"><b> &nbsp;No Blood Pressure History Avaialable</b></span>";
}


$conn->close();



//back
if(isset($_POST["back"])){ 
    echo("<script>window.location.href='(HC) Patient_BloodPressureHome.php'; </script>"); 
}
?>
