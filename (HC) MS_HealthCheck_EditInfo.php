<?php
  $Title='Heath Check';
  include_once("(1) NavBar(MS).php");

  $conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
  $email=$_SESSION['email']; 
  $roomId= $_SESSION['health_check_choice']; 

//Select specific data
if (isset($_GET['healthcheck_info_room'])&& isset($_GET['healthcheck_info_title'])) {  
  

      $healthcheck_info_room=$_GET['healthcheck_info_room']; 
      $healthcheck_info_title=$_GET['healthcheck_info_title'];

      $query = "SELECT * FROM healthcheck_info WHERE healthcheck_info_room= '$roomId'&& healthcheck_info_title='$healthcheck_info_title'";  
      $run = mysqli_query($conn,$query);


?>


<!DOCTYPE html>
<html lang="en">

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

      /* Button Centered*/
      .buttonCentered {
    text-align: center;
    position: relative;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}

/*Button */
.btn{
  cursor: pointer;
  width:120px;
  text-align: center;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;}


/*Text */
.inputFieldLongText{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;        
  font-size: 16px;
         border-radius: 15px;
         border:1px;
         height:100px;
         background-color: #e6e6e6;
      }

textarea:focus{
      background-color : beige; 
      color: #424b57;
      border-color: white;

    }

  </style>
</head>

<body class='body'>
<div class="centered">
<br>
<br><br>
<form class=content action="<?php echo $_SERVER [ 'PHP_SELF' ]?>" method="post" enctype="multipart/form-data">
<br>
<header >
  <span style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:25px;"> Edit Infomation</span>
  </header>
    <hr>
<?php  if ($run){ 
    $result = mysqli_fetch_assoc($run)?>
    <!--Content-->
    <table >
    <tr>
  <td > <input type="hidden" name="hcID" value="<?php echo"".$result['healthcheck_info_id']."";?>"></td>
  <td colspan="2"><textarea class="inputFieldLongText" id="title" name="title" style="height:35px" cols="128">&nbsp;<?php echo"$healthcheck_info_title";?></textarea> </td>
  </tr>
  <tr style="height:20px"></tr>
  <tr>
  <td >
  <td colspan="2"><textarea class="inputFieldLongText" id="content" name="content" rows="6" cols="128" >&nbsp;<?php echo"".$result['healthcheck_info_content']."";?></textarea> </td>
  </tr>
  <tr style="height:20px"></tr>


      </table>
  <hr>

    <!--Button-->
  <div class=buttonCentered>
  <button type="submit" class="btn btn-primary" name="edit" id="edit" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;">Edit Post</button>
  <button type="submit" class="btn btn-danger" name="cancel" id="cancel" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;font-size:21px;border-radius: 100px;"><span style="color:white">Cancel<span></button>
</div>

<br>
<?php }else{

echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}?>
</form>
</div>

</body>
</html>

<?php
if(isset($_POST["cancel"])){ 
    echo("<script>window.location.href='(HC) MS_HealthCheck_Home.php'; </script>"); 
}

if(isset($_POST["edit"])){ 
$HealthCheckInfoTitleNew = filter_input(INPUT_POST, 'title');
$HealthCheckInfoContentNew = filter_input(INPUT_POST, 'content');
$healthcheck_info_id= filter_input(INPUT_POST, 'hcID');


if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "UPDATE healthcheck_info SET healthcheck_info_title='" . addslashes($HealthCheckInfoTitleNew) . "',healthcheck_info_content='" . addslashes($HealthCheckInfoContentNew) . "'
WHERE healthcheck_info_id='$healthcheck_info_id'";

if ($conn->query($sql)){
  echo("<script> alert('Infomation is edited successfully.');window.location.href='(HC) MS_HealthCheck_Home.php'; </script>");
}
else{

echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}


?>
