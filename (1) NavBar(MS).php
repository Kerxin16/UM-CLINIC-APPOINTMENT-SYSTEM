<?php
$conn = new mysqli('localhost:3307','root','1234','um_healthcare_system');
session_start();
$email=$_SESSION['email'];

//unable to return to previous system page
if (!isset($_SESSION['email'])) {
	header("location: indexClinic.php");
	die();
}

//Support Chat Total Number Of Notification
if (isset($email)) {
  //Get user info
  $queryUser = " SELECT * FROM users 
  join chats on user_id= to_id
  WHERE user_email='$email' AND chats.opened=0;";
  $runUser = mysqli_query($conn,$queryUser); 
  $user = mysqli_fetch_assoc($runUser);
  $rowNotification = mysqli_num_rows($runUser);
  
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    /*Header*/
  .header {
    padding: 30px;
    text-align: center;
    background: white;
    height:30%;

    }

    /*NavBar*/
    nav{
      background: #424b57;
        overflow: hidden;
        width: 100%;
        float: left;
    border: 1px solid #121314;
    border-top: 1px solid #2b2e30;
    }

  nav ul {
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #424b57;
      list-style: none;
      font-size: 18px;
  }
  


nav li {
  float: left;
}


nav li a {
  display: block;
  color:  #c2d6d6;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

nav li a:hover:not(.active) {
  background-color: #a8b1bd;
  color: #424b57;
}



/*SIDE NAV */
.sidenav {
  height: 100%; 
  width: 0; /*Width change with javascript*/
  position: fixed; 
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #2c323a; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 132px; 
}

/* SieNav links */
.sidenav a {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  padding: 8px 15px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #c2d6d6;
  display: block;
  transition: 0.3s;
}


/* Dropdown button */
.dropdown-btn {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  padding: 8px 15px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #c2d6d6;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
  transition: 0.3s;

}

/* SideNav Hovering */
.sidenav a:hover, .dropdown-btn:hover {
  background-color: #a8b1bd;
  color: #424b57;
}

.sidenav .closebtn:hover{
  background-color: #a8b1bd;
  color: black;
}

/* Active dropdown button */
.active {
  background-color: beige;
  color:  #424b57;
}

/* Dropdown container */
.dropdown-container {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: 18px;
  display: none;
  background-color: #424b57;
  color:beige;
}


/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  top: 0;
 left: 3px;
  font-size: 20px;
  color:white;
}

/*Menu Icon */
.menuIcon {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  cursor: pointer;
}


/*Down Arrow in Dropdown Menu */
.arrow {
  border: solid #c2d6d6;
  border-width: 0 2px 2px 0;
  display: inline-block;
  padding: 3px;
}
.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.notification1 {
  float: right;
  color: white;
  background-color: red;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;         
  font-size: 16px;
  border-radius: 50%; /* Set border-radius to 50% for a circle */
  width: 25px; /* Set a fixed width */
  height: 25px; /* Set a fixed height */
  text-align: center; /* Center text horizontally */
  line-height: 20px; /* Center text vertically */
}
  </style>
<!--Website Name And icon-->
<title><?php echo $Title?> | University Malaya Healthcare</title>
<link rel="icon" href="/images/UniversityOfMalaya.jpg">
</head>

<body >

 <!--Header-->
 <div class="header">
    <div><image src="images/Slogan1.png" size></div>
</div>


<!--NavBar--> 
<nav>
    <ul width="100%">

    <li style="float:right" ><a href="(1) LogOutClinic.php"><span class="glyphicon glyphicon-log-in" name="logout" id="logout"></span> Log Out</a></li>

  <!--SideNav, DropDownButton-->
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&times;</a>
  <a href="(HOME) MS_Home.php">Home</a>
  <button class="dropdown-btn">Clinic Appointment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="arrow down"></i>
  </button>
  <div class="dropdown-container">
  <a href="(CA) ClinicAppointmentMS.php">Manage Online Appointment</a>
  <a href="(CA) MS_WalkInPatient.php">Walk In Patient</a>
    <a href="(CA) MS_Assign_Room_Combination.php">Room Assignation</a>
    <a href="(CA) MS_Full_Appointment_List.php">Full Appointment List</a>
  </div>
  <a href="(HR) MS_HR_Home.php">Health Record</a>

  <button class="dropdown-btn">Health Check &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="arrow down"></i>
  </button>
  <div class="dropdown-container">
  <a href="(HC) MS_HealthCheck_Home.php?room1='BMI'" room1='btn'>Body Mass Index</a>
  <a href="(HC) MS_HealthCheck_Home.php?room2='BloodPressure'" room2='btn'>Blood Pressure</a>
  <a href="(HC) MS_HealthCheck_Home.php?room3='HeartTRate'" room3='btn'>Heart Rate</a>
  </div>

  <a href="(SC) Home.php">Support Chat <?php 
  if($rowNotification>0){
  echo"<span class='notification1'>$rowNotification</span>";}?></a>
</div>





<!-- Use any element to open the sidenav -->
<span onclick="openNav()" class="menuIcon">&nbsp;
<svg xmlns="http://www.w3.org/2000/svg" width="60" height="50" fill="#c2d6d6" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg></span>

</ul>
</nav>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content  */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


</script>




</body>
</html>
