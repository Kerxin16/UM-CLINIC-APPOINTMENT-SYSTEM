<?php

/*Database Connection*/
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');


if(isset($_POST["LogIn"])){  
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $Role = filter_input(INPUT_POST, 'Role');


    //AUTO UPDATE CHECK IN FOR DOCTOR
    //Check whether doctor checked in or not
    $queryCheck = "SELECT * FROM doctor";
    $runCheck = mysqli_query($conn, $queryCheck); 

     /*Check in date time */
     date_default_timezone_set("Asia/Kuala_Lumpur");
     $todayDate = date("Y-m-d");
 

    while ($resultCheck= mysqli_fetch_assoc($runCheck)) {

    $DoctorCheckInStatus= $resultCheck['Doctor_Check_In_Status'];


    // For daily auto update check in status purpose
    //Retrieve only health record date
    $lastCheckInDateTime= "".$resultCheck['Doctor_Check_In_DateTime']."";

    // Convert the datetime string to a Unix timestamp
    $timestamp = strtotime($lastCheckInDateTime);

    // Format the timestamp to display only the date
    $lastCheckInDate = date('Y-m-d', $timestamp); 

 

    if($lastCheckInDate < $todayDate){
      //Automatically Update to Not Check In daily
      $queryUpdate = "UPDATE doctor SET Doctor_Check_In_Status='Not Checked In' where doctor_id=".$resultCheck['doctor_id']."";  
      $runUpdate = mysqli_query($conn,$queryUpdate);
    }

    }


     /*Check Validity for Doctor */
 $validityDoctor = mysqli_query($conn, "SELECT * FROM doctor WHERE Doctor_Email = '$email'");
 $array2 = mysqli_fetch_assoc($validityDoctor);

 
    /*Check Validity for Admin */
    $validityAdmin = mysqli_query($conn, "SELECT * FROM clinic_staff WHERE Clinic_Staff_Email = '$email'");
    $array3 = mysqli_fetch_assoc($validityAdmin);

    /*Create Session for chatting*/
    $chatquery = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$email'");
    $user = mysqli_fetch_assoc($chatquery);

  
 if (mysqli_num_rows($validityDoctor) > 0 && $Role =='Clinical Doctor' && $email == $array2['Doctor_Email']){
    session_start();
    $_SESSION['email']= $email;
    /*Create Session for chatting*/
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['user_id'];

    /*Check Validity for Doctor */
    if($password == $array2['Doctor_Password']){
      echo("<script> alert('Login Successfully'); window.location.href='(HOME) doctorHome.php'; </script>"); 
      $conn->close();
    }
    else{
      echo("<script> alert('Incorrect Password. Please Re-enter Password');window.location.href='indexClinic.php'; </script>");
      $conn->close();
    }

  }else if (mysqli_num_rows($validityAdmin) > 0 && $Role =='Clinical Staff' && $email == $array3['Clinic_Staff_Email']){
    session_start();
    $_SESSION['email']= $email;
    /*Create Session for chatting*/
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['user_id'];
       
    /*Check Validity for Admin */
    if($password == $array3['Clinic_Staff_Password']){
      echo("<script> alert('Login Successfully'); window.location.href='(HOME) MS_Home.php'; </script>"); 
      $conn->close();
    }
    else{
      echo("<script> alert('Incorrect Password. Please Re-enter Password');window.location.href='indexClinic.php'; </script>");
      $conn->close();
    }

  }
  else{
    echo("<script> alert('User Not Valid');window.location.href='indexClinic.php'; </script>");
    $conn->close();
  }
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
    /* Make whole document located at center*/
    .centered {
      margin: auto;
      width: 30%;
      padding: 30px;
      background-color: #373f49;
      position:absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
 
    }

    /*Table Space for login*/
    .TableSpace{
      padding-left: 15px;
      padding-bottom: 10px;
    }


    /* Login Text*/
    .headerCentered {
      text-align: center;
      position: relative;
      font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
    }

    /* Table Center*/
    table {
      margin-left: auto; 
      margin-right: auto;

    }

    /*Background of the form*/
    .formBackground {
    padding: 0 18px;
    background-color: #424b57;
    }

    /*Rounded Image */
    img{
        border-radius: 50%;
        box-shadow: 0px 0px 2px black;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width:90px;
        height:90px;
        margin-bottom: -5%;
        align-items: center;
        
    }

    /*Make icon and text field together*/
    .together{
        width:400px; 
        position:relative;
    }

    .input{
        width:100%;
        outline:0;
        border:3px solid #373f49;
        border-radius: 25px;
        padding:10px;
        padding-left:60px;
        background:transparent;
        color:white;
    }

    .input::placeholder{
        color:#b3cccc;
        font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
    }

    .input:focus{
        color:white;
        border-color: white;
        background-color : #424b57; 
    }

    .icon{
        position:absolute;
        left:0;
        top:0;
        width:60px;
        height:100%;
        display:flex;
        justify-content: center;
        align-items: center;
    }

    /*Button*/
    .btn{
      background: #7c8a9c;
      outline:none;
      cursor: pointer;
      font-size:22px;
      font-weight: 500;
      border-radius: 20px;
      font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
      color: white;
      width:400px;
      justify-content: center;
      align-items: center;
    }


    /*Link Color */
    a:link {
    color: green;
    background-color: transparent;
    text-decoration: none;
    }

    a:visited {
    color: green;
    background-color: transparent;
    text-decoration: none;
    }

    a:hover {
    color: red;
    background-color: transparent;
    text-decoration: underline;
    }

</style>

<title>University Malaya Healthcare Login</title>
    <link rel="icon" href="/images/UniversityOfMalaya.jpg">

</head>

<body class="centered">
<!--Login Page-->
<div><image src="images/healthcare.png"></div>

<form class=formBackground action="" method="post">

 <br>
 <br>
   
<header >
    <h1 class= headerCentered style="color:#c2d6d6" > CLINIC LOGIN </header>
<br>
<br>
<!--Content-->
<table class="center">

<tr>
  <td >
    <div class="together">
    <input type="email"  class="input" id ="email" name="email" placeholder="Email ID" required>
    <div class="icon" style='color:#476b6b;'><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
</svg>
</div></td>
</div>
</tr>


<!--Create Space between rows-->
<tr height=15px></tr>

<tr>
  <td >
    <div class="together">
    <input type="password"  class="input" id ="password" name="password" placeholder="Password" required>
    <div class="icon"style='color:#476b6b;'>
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
</div></td>
</div>
</tr>

<tr height=15px></tr>

<td>
<div class="together">
  <select class="input" name="Role" style="color:#c2d6d6" required>
    <option disabled selected value> Select Role</option>    
    <option id="Clinical Doctor" value="Clinical Doctor"><label for="Clinical Doctor" >Clinical Doctor</label></option>
    <option id="Clinical Staff" value="Clinical Staff"><label for="Clinical Staff" >Admin</label></option>
  </select>
<div class="icon" style='color:#476b6b;'>
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg>
</div>
</div></td>
</tr>


<tr height=30px></tr>
</table>

<div class= headerCentered>
  <button type="submit" class=btn name="LogIn" id="LogIn">Log In</button>
</div>
<br>

<br>
</form>

<br>
</body>
</html>


